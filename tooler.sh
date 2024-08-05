#!/bin/bash

# Change to home directory
cd ~
mkdir ~/tools/ ~/.gf
cd ~/tools && git clone https://github.com/tomnomnom/gf.git && cp  -r gf/examples/ ~/.gf/ && cd ~
# Download and extract Go
curl -OL https://go.dev/dl/go1.21.0.linux-amd64.tar.gz
sudo tar -C /usr/local -xvf go1.21.0.linux-amd64.tar.gz

# Add Go to PATH
echo 'export PATH=$PATH:/usr/local/go/bin:/home/$USER/go/bin/' >> ~/.bashrc
echo 'source /home/$USER/tools/gf/gf-completion.bash'  >> ~/.bashrc
source ~/.bashrc

# Download recon.sh and tmux.conf
wget https://raw.githubusercontent.com/0xLegendKiller/BugTest/main/recon.sh -O recon.sh
wget https://raw.githubusercontent.com/0xLegendKiller/BugTest/main/tmux.conf -O ~/.tmux.conf

# Install jq using snap
sudo snap install jq

# Install Go packages
go install -v github.com/tomnomnom/gf@latest
go install -v github.com/projectdiscovery/pdtm/cmd/pdtm@latest 
go install -v github.com/projectdiscovery/nuclei/v2/cmd/nuclei@latest
go install -v github.com/tomnomnom/assetfinder@latest
go install -v github.com/tomnomnom/fff@latest
go install -v github.com/tomnomnom/httprobe@latest
go install -v github.com/projectdiscovery/subfinder/v2/cmd/subfinder@latest
go install -v github.com/tomnomnom/anew@latest
go install -v github.com/projectdiscovery/httpx/cmd/httpx@latest
go install -v github.com/xm1k3/cent@latest

# Initialize cent and install templates
cent init
cent -p cent-nuclei-templates -k
