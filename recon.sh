#!/bin/bash

# Check if the root domain file is provided
if [ -z "$1" ]; then
    echo "Usage: $0 <root_domain_file>"
    exit 1
fi

root_domain=$1

# Check if the root domain file exists and is not empty
if [ ! -s "$root_domain" ]; then
    echo "The file $root_domain does not exist or is empty."
    exit 1
fi

# Create or empty the domains and hosts files
> domains
> hosts

echo "-----------------   Using ASSETFINDER      -----------------"
cat $root_domain | assetfinder -subs-only | anew domains
echo "-----------------   Finshed ASSETFINDER    -----------------"

echo "-----------------   Using SUBFINDER    -----------------"
subfinder -silent -dL $root_domain | anew domains
echo "-----------------   Finshed SUBFINDER    -----------------"

echo "-----------------   Using CRT_SH    -----------------"
while read -r domain; do
    curl -s "https://crt.sh/?q=$domain&output=json" | jq -r ".[].common_name" | sed 's/\*.//g' | anew domains
done < "$root_domain"
echo "-----------------   Finshed CRT_SH    -----------------"

# Filter out out-of-scope domains
echo "-----------------   Filtering Out-of-Scope Domains    -----------------"
> filtered_domains
while read -r prefix; do
    grep "^$prefix" domains >> filtered_domains
done < "$root_domain"
sort -u filtered_domains -o filtered_domains
echo "-----------------   Finished Filtering    -----------------"

echo "-----------------   Probing Live Hosts    -----------------"
cat filtered_domains | httpx | anew hosts
cat filtered_domains | httprobe | anew hosts

echo "-----------------   THE END  -----------------"
