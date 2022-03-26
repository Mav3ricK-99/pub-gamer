<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <script src="https://sdk.mercadopago.com/js/v2"></script>
    <script>
        const mp = new MercadoPago("TEST-04331d26-acbf-4daa-9e70-976ebbd4c15e");
    </script>

    <form id="form-checkout">
        
        <input type="text" name="cardNumber" id="form-checkout__cardNumber" />
        <input type="text" name="cardExpirationDate" id="form-checkout__cardExpirationDate" />
        <input type="text" name="cardholderName" id="form-checkout__cardholderName" />
        <input type="email" name="cardholderEmail" id="form-checkout__cardholderEmail" />
        <input type="text" name="securityCode" id="form-checkout__securityCode" />
        <select name="issuer" id="form-checkout__issuer"></select>
        <select name="identificationType" id="form-checkout__identificationType"></select>
        <input type="text" name="identificationNumber" id="form-checkout__identificationNumber" />
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <select name="installments" id="form-checkout__installments"></select>
        <button type="submit" id="form-checkout__submit">Pagar</button>
        <progress value="0" class="progress-bar">Cargando...</progress>
    </form>

    <script>
        const cardForm = mp.cardForm({
            amount: "100.5",
            autoMount: true,
            form: {
                id: "form-checkout",
                cardholderName: {
                    id: "form-checkout__cardholderName",
                    placeholder: "Titular de la tarjeta",
                },
                cardholderEmail: {
                    id: "form-checkout__cardholderEmail",
                    placeholder: "E-mail",
                },
                cardNumber: {
                    id: "form-checkout__cardNumber",
                    placeholder: "Número de la tarjeta",
                },
                cardExpirationDate: {
                    id: "form-checkout__cardExpirationDate",
                    placeholder: "Data de vencimiento (MM/YYYY)",
                },
                securityCode: {
                    id: "form-checkout__securityCode",
                    placeholder: "Código de seguridad",
                },
                installments: {
                    id: "form-checkout__installments",
                    placeholder: "Cuotas",
                },
                identificationType: {
                    id: "form-checkout__identificationType",
                    placeholder: "Tipo de documento",
                },
                identificationNumber: {
                    id: "form-checkout__identificationNumber",
                    placeholder: "Número de documento",
                },
                issuer: {
                    id: "form-checkout__issuer",
                    placeholder: "Banco emisor",
                },
            },
            callbacks: {
                onFormMounted: error => {
                    if (error) return console.warn("Form Mounted handling error: ", error);
                    console.log("Form mounted");
                },
                onSubmit: event => {
                    event.preventDefault();

                    const {
                        paymentMethodId: payment_method_id,
                        issuerId: issuer_id,
                        cardholderEmail: email,
                        amount,
                        token,
                        installments,
                        identificationNumber,
                        identificationType,
                    } = cardForm.getCardFormData();

                    fetch("http://localhost:8000/pago/", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                        },
                        body: JSON.stringify({
                            token,
                            issuer_id,
                            payment_method_id,
                            transaction_amount: Number(amount),
                            installments: Number(installments),
                            description: "Descripción del producto",
                            payer: {
                                email,
                                identification: {
                                    type: identificationType,
                                    number: identificationNumber,
                                },
                            },
                        }),
                    });
                },
                onFetching: (resource) => {
                    console.log("Fetching resource: ", resource);

                    // Animate progress bar
                    const progressBar = document.querySelector(".progress-bar");
                    progressBar.removeAttribute("value");

                    return () => {
                        progressBar.setAttribute("value", "0");
                    };
                }
            },
        });
    </script>

</body>

</html>