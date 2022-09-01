# Method 1
cat wildcards.txt | assetfinder -subs-only | anew domains
amass enum -df wildcards.txt | anew domains
subfinder -silent -dL wildcards.txt| anew domains




sort -u domains | httprobe > uniq.txt

eyewitness --web -f uniq.txt -d /path_to_save_screenshots # optional , takes time, better grep for juicy domains and move forward

```bash
for I in $(ls); do 
        echo "$I" >> index.html;
        echo "<img src=$I><br>" >> index.html;
done
```

paramspider -d target.com > /filepath/param.txt

dalfox -b l3gend.xss.ht file param.txt
