# Method 1

amass enum -d target.com -o /filepath/subdomains.txt

sort -u subdomains.txt | httprobe > /filepath/uniq.txt

eyewitness --web -f uniq.txt -d /path_to_save_screenshots # optional , takes time, better grep for juicy domains and move forward

```bash
for I in $(ls); do 
        echo "$I" >> index.html;
        echo "<img src=$I><br>" >> index.html;
done
```

paramspider -d target.com > /filepath/param.txt

dalfox -b l3gend.xss.ht file param.txt
