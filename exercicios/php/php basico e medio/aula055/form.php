<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Formulário</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            margin-top: 50px;
        }

        .form-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        h3 {
            color: #333;
            text-align: center;
            margin-bottom: 30px;
            font-size: 2rem;
            font-weight: 300;
            letter-spacing: 2px;
        }

        .form-row {
            display: flex;
            gap: 20px;
            margin-bottom: 25px;
        }

        .form-col {
            flex: 1;
        }

        .form-col-full {
            width: 100%;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
            font-weight: 500;
            font-size: 0.95rem;
        }

        input[type="text"],
        input[type="password"],
        select,
        textarea {
            width: 100%;
            padding: 12px 16px;
            border: 2px solid #e1e5e9;
            border-radius: 10px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: #fafafa;
        }

        input[type="text"]:focus,
        input[type="password"]:focus,
        select:focus,
        textarea:focus {
            outline: none;
            border-color: #667eea;
            background: white;
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(102, 126, 234, 0.1);
        }

        select {
            cursor: pointer;
        }

        textarea {
            resize: vertical;
            min-height: 120px;
        }

        .checkbox-group,
        .radio-group {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .form-check {
            display: flex;
            align-items: center;
            padding: 10px;
            border-radius: 8px;
            transition: background-color 0.2s ease;
        }

        .form-check:hover {
            background-color: #f8f9ff;
        }

        input[type="checkbox"],
        input[type="radio"] {
            width: 18px;
            height: 18px;
            margin-right: 12px;
            cursor: pointer;
            accent-color: #667eea;
        }

        .form-check label {
            margin-bottom: 0;
            cursor: pointer;
            user-select: none;
        }

        .submit-btn {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            padding: 15px 50px;
            border-radius: 50px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin: 0 auto;
            display: block;
        }

        .submit-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 30px rgba(102, 126, 234, 0.4);
        }

        .submit-btn:active {
            transform: translateY(-1px);
        }

        .fill-btn {
            background: transparent;
            color: #667eea;
            border: 2px solid #667eea;
            padding: 10px 30px;
            border-radius: 25px;
            cursor: pointer;
            font-weight: 500;
            transition: all 0.3s ease;
            margin: 20px auto 0;
            display: block;
        }

        .fill-btn:hover {
            background: #667eea;
            color: white;
            transform: translateY(-2px);
        }

        @media (max-width: 768px) {
            .form-row {
                flex-direction: column;
                gap: 0;
            }
            
            .form-card {
                padding: 25px;
                margin: 20px 10px;
            }
            
            h3 {
                font-size: 1.5rem;
            }
        }

        /* Animação de entrada */
        .form-card {
            animation: slideUp 0.6s ease-out;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="form-card">
            <h3>FORMULÁRIO</h3>

            <form action="submissao.php" method="post" name="formulario">
                <div class="form-row">
                    <div class="form-col">
                        <div class="form-group">
                            <label>Texto</label>
                            <input type="text" name="text_texto" placeholder="Digite seu nome">
                        </div>
                    </div>
                    <div class="form-col">
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="text_password" placeholder="Digite sua senha">
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-col-full">
                        <div class="form-group">
                            <label>País</label>
                            <select name="select">
                                <option value="" selected disabled>Selecione uma opção</option>
                                <option value="Portugal">Portugal</option>
                                <option value="Brasil">Brasil</option>
                                <option value="Angola">Angola</option>
                                <option value="Moçambique">Moçambique</option>
                                <option value="Cabo Verde">Cabo Verde</option>
                                <option value="Guiné-Bissau">Guiné-Bissau</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-col">
                        <div class="form-group">
                            <label>Opções Múltiplas</label>
                            <div class="checkbox-group">
                                <div class="form-check">
                                    <input type="checkbox" name="check_1" id="check_1" value="check_1">
                                    <label for="check_1">Texto da checkbox 1</label>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" name="check_2" id="check_2" value="check_2">
                                    <label for="check_2">Texto da checkbox 2</label>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" name="check_3" id="check_3" value="check_3">
                                    <label for="check_3">Texto da checkbox 3</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-col">
                        <div class="form-group">
                            <label>Escolha Única</label>
                            <div class="radio-group">
                                <div class="form-check">
                                    <input type="radio" name="radio" id="radio_1" value="radio_1">
                                    <label for="radio_1">Opção 1</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" name="radio" id="radio_2" value="radio_2">
                                    <label for="radio_2">Opção 2</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" name="radio" id="radio_3" value="radio_3">
                                    <label for="radio_3">Opção 3</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-col-full">
                        <div class="form-group">
                            <label>Área de texto</label>
                            <textarea name="text_area" placeholder="Digite sua mensagem aqui..."></textarea>
                        </div>
                    </div>
                </div>

                <button type="submit" class="submit-btn">Enviar</button>
            </form>

            <button class="fill-btn" id="preencher">Preencher Automaticamente</button>
        </div>
    </div>

    <script>
        document.querySelector("#preencher").addEventListener('click', () => {
            const formulario = document.forms.formulario
            formulario['text_texto'].value = "Joao Ribeiro"
            formulario['text_password'].value = "abc123"
            formulario['select'].value = "Portugal"
            formulario['check_1'].checked = true
            formulario['radio'][0].checked = true
            formulario['text_area'].value = "Este é um texto de exemplo para a área de texto."
        })
    </script>
</body>

</html>