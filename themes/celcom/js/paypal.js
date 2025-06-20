console.log('paypal here');
console.log(paypal);
paypal.Buttons({
    style: {
      layout: 'vertical',
      color:  'blue',
      shape:  'rect',
      label:  'pay'
    },

    createOrder: function(data, actions) {
        // Set up the transaction
      return actions.order.create({
        purchase_units: [{
          
          amount: {
            currency_code: 'USD',
            value: document.getElementById('paypal_amount_usd').value
          },
          payee: {
            email_address: 'hillaryng14@gmail.com',
          }
        }],
        payer: {
            payer_base: {
                email_address: document.getElementById('paypal_client_email').value,
            },
        },
      });
    },

    onApprove: function(data, actions) {
        // This function captures the funds from the transaction.
        return actions.order.capture().then(function(details) {
          document.getElementById('paypal_amount_usd').value = "";
          document.getElementById('paypal_client_email').value = "";

          // This function shows a transaction success message to your buyer.
          alert('Transaction completed by ' + details.payer.name.given_name);
        });
    },
}).render('#paypal-button-container');
