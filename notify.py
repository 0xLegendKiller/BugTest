import re
import asyncio
import requests
import discord
import sys

# Replace with your Slack webhook URL
slack_webhook_url = "https://hooks.slack.com/services/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"

# Replace with your Discord webhook URL
discord_webhook_url = "https://discord.com/api/webhooks/1142401967931523072/MB4BGaM93IpLNKCfEWPHOmMwhUWjaOk1T12mp9rDrqR3uMYsctLPUPyflhIt_T6kVPnn"

# Read existing results from the file
def read_results(filename):
    try:
        with open(filename, "r") as file:
            return set(file.read().splitlines())
    except FileNotFoundError:
        return set()

# Write new result to the file
def write_result(filename, result):
    with open(filename, "a") as file:
        file.write(result + "\n")

# Process Nuclei output

def process_output(output, existing_results):
    output = output.strip()

    # Remove escape codes and unwanted characters
    cleaned_output = re.sub(r'\[\d+m', '', output)

    # Check if the result is new
    if cleaned_output not in existing_results:
        write_result(results_file, cleaned_output)
        send_slack_notification(cleaned_output)
        send_discord_notification(cleaned_output)
async def read_nuclei_output(existing_results):
    while True:
        line = await loop.run_in_executor(None, sys.stdin.readline)
        if not line:
            break  # No more input
        process_output(line, existing_results)

def send_slack_notification(message):
    slack_payload = {
        "text": message,
    }
    requests.post(slack_webhook_url, json=slack_payload)

def send_discord_notification(message):
    discord_payload = {
        "content": message,
    }
    headers = {"Content-Type": "application/json; charset=utf-8"}
    requests.post(discord_webhook_url, json=discord_payload, headers=headers)
#    requests.post(discord_webhook_url, json=discord_payload)

if __name__ == "__main__":
    results_file = "/home/adishiv2762/results.txt"  # Default output filename

    # Read existing results from the file
    existing_results = read_results(results_file)

    # Set up asyncio event loop
    loop = asyncio.get_event_loop()

    # Start reading nuclei output asynchronously
    asyncio.ensure_future(read_nuclei_output(existing_results))

    try:
        loop.run_forever()
    except KeyboardInterrupt:
        pass
    finally:
        loop.close()
