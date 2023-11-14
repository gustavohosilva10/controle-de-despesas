<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="pt_BR" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="viewport" content="width=device-width"/>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title>Controle de despesas</title>
</head>
<body style="margin:0; background: #f8f8f8; ">
<div
    style="background: #f8f8f8; padding: 0 0; font-family: arial; line-height:28px; height:100%;  width: 100%; color: #514d6a;">
    <div style="background: #FFF; max-width: 700px; padding:50px 0;  margin: 0 auto; font-size: 14px">
        <table border="0" cellpadding="0" cellspacing="0" style="width: 100%; margin-bottom: 20px">
            <tbody>
            <tr>
                <td style="vertical-align: top; padding-bottom:30px;" align="center">
                    </a>
                    <h2>Controle de Despesas</h2>
                    <div style="padding: 0 20px 0 20px; background: #fefefe;">
                        <p>Sua despesa foi cadastrada com sucesso!</p>
                        <p>Usuario: {{ $sendMail->user }}</p>
                        <p>Descrição: {{ $sendMail->description }}</p>
                        <p>Categoria: {{ $sendMail->category }}</p>
                        <p>Valor: {{ $sendMail->value }}</p>
                        <p>Data: {{ $sendMail->date }}</p>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
