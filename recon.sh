
#!/bin/bash
root_domain=$1
echo "-----------------   Using ASSETFINDER      -----------------"
cat $root_domain | assetfinder -subs-only | anew domains
echo "-----------------   Finshed ASSETFINDER    -----------------"
echo "-----------------   Using SUBFINDER    -----------------"
subfinder -silent -dL $root_domain| anew domains
echo "-----------------   Finshed SUBFINDER    -----------------"
echo "-----------------   Using CRT_SH    -----------------"
for i in $(cat $root_domain);do curl "https://crt.sh/?q=$i&output=json" | jq -r ".[].common_name" | sed 's/\*.//g' | anew domains;done 
echo "-----------------   Finshed CRT_SH    -----------------"
echo "-----------------   THE END  -----------------"
cat domains | httpx | anew hosts
cat domains | httprobe | anew hosts
