<?php
   $url = 'https://www.posnet.ykb.com/PosnetWebService/XML';
   //$url = 'https://www.verisign.com';
   $params = "xmldata=".
			"<posnetRequest>".
				"<mid>6700000067</mid>".
				"<tid>67000067</tid>".
				"<sale>".
					"<amount>2451</amount>".
					"<ccno>4506349116608409</ccno>".
					"<currencyCode>YT</currencyCode>".
					"<cvc>123</cvc>".
					"<expDate>0703</expDate>".
					"<orderID>1s3456z8901234567890QWER</orderID>".
				"</sale>".
			"</posnetRequest>"
	;

   $user_agent = "Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)";

   $ch = curl_init();
   curl_setopt($ch, CURLOPT_POST,1);
   curl_setopt($ch, CURLOPT_POSTFIELDS,$params);
   curl_setopt($ch, CURLOPT_URL,$url);
   curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,  FALSE);
   curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
   curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); 
   curl_setopt($ch, CURLOPT_TIMEOUT, 30);

   $result=curl_exec ($ch);
   if (curl_errno($ch)) 
       echo(curl_errno($ch)." - ".curl_error($ch));
   curl_close ($ch);

   echo(HtmlEntities($result));
?>