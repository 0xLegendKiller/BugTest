#!/bin/bash
echo "
"

echo "####### Using wildacards ###########"
cat wildcards.txt | assetfinder -subs-only | anew domains
echo "####### HTTProbe ###########"
cat domains | httprobe -c 80 --prefer-https | anew hosts
echo "####### Using fff's fuffing ###########"
echo "####### Keep Calm ! ###########"
cat hosts | fff -d 1 -S -o roots
echo "####### All done ! ###########"
