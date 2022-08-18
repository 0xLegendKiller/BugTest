#!/bin/bash
cat <<'BANNER'

   ___       _                               _ _  ___ _ _           
  / _ \     | |                             | | |/ (_) | |          
 | | | |_  _| |     ___  __ _  ___ _ __   __| | ' / _| | | ___ _ __ 
 | | | \ \/ / |    / _ \/ _` |/ _ \ '_ \ / _` |  < | | | |/ _ \ '__|
 | |_| |>  <| |___|  __/ (_| |  __/ | | | (_| | . \| | | |  __/ |   
  \___//_/\_\______\___|\__, |\___|_| |_|\__,_|_|\_\_|_|_|\___|_|   
                         __/ |                                      
                        |___/    ~ https://twitter.com/0xLegendKiller
 (A simple recon script inspired by Tomnomnom's bug bounty methodology)
BANNER

echo "####### Using wildacards ###########"
cat wildcards.txt | assetfinder -subs-only | anew domains
echo "####### HTTProbe ###########"
cat domains | httprobe -c 80 --prefer-https | anew hosts
echo "####### Using fff's fuffing ###########"
echo "####### Keep Calm ! ###########"
cat hosts | fff -d 1 -S -o roots
echo "####### All done ! ###########"
