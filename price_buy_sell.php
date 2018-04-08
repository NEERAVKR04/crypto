<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <script>
        function checkSell()
          {
          document.getElementById('change_text').innerHTML='Sell Price:';
          if()
          {
          document.getElementById('price_indicator').innerHTML= '401000';
          }  
        } 
        function checkBuy()
          {
          document.getElementById('change_text').innerHTML='Buy Price:';
          document.getElementById('price_indicator').innerHTML= '382000';
          }
          function btc()
          {
          document.getElementById('price_indicator').innerHTML='382000';
          }
          function eth()
          {
          document.getElementById('price_indicator').innerHTML='22000';
          }
          function ltc()
          {
          document.getElementById('price_indicator').innerHTML='6600';
          }
          function xrp()
          {
          document.getElementById('price_indicator').innerHTML='26';
          }
          function bch()
          {
          document.getElementById('price_indicator').innerHTML='26700';
          }
    </script>
  
    <body>
        <h2>Smart Price Prediction</h2>
        <form action="price_buy_sell.php" method="POST">
               <table border="0" cellpadding="10">
                   <tbody>
                       <tr>
                           <td>
                               <label><b>Select your Coin:</b></label>
                               <br/>
                               <input type="radio" name="select_coin" checked value="BTC" onclick="btc()">BTC        
                               <input type="radio" name="select_coin" value="ETH" onclick="eth()">ETH
                               <input type="radio" name="select_coin" value="LTC" onclick="ltc()">LTC
                               <input type="radio" name="select_coin" value="XRP" onclick="xrp()">XRP
                               <input type="radio" name="select_coin" value="BCH" onclick="bch()">BCH
                               <br/>
                               <br/>
                               <label><b>What You Want To Do?</b></label>
                               <br/>
                               <input type="radio" name="buy_sell" value="Buy" checked onclick="checkBuy()"> Buy
                               <input type="radio" name="buy_sell" value="Sell" onclick="checkSell()"> Sell<br>
                           </td>
                           </tr>
                           <td>
                               <label id="change_text">Buy Price:
                                   
                               </label>
                               <label id="price_indicator">
                                   <script>btc()</script>
                               </label>
                              
                           </td>
                   </tbody>
            </table>
        </form>
    </body>
</html>
