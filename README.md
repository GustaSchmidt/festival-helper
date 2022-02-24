# Prog Carnavibe

Esse projeto foi desenvolvido para solucionar um problema comum em festivais de musica com diversos palcos, quem nunca se perguntou *"quem está tocando no palco X?"*, pensando nisso foi desenvolvido esse site, que mostra de forma simples essa informação e atualiza em tempo real a mesma, utilizando a as tecnologias.

Teste o funcionamento em: https://fast-helper.herokuapp.com/

![enter image description here](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)![enter image description here](https://img.shields.io/badge/JavaScript-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black)![enter image description here](https://img.shields.io/badge/HTML5-E34F26?style=for-the-badge&logo=html5&logoColor=white)![enter image description here](https://img.shields.io/badge/CSS3-1572B6?style=for-the-badge&logo=css3&logoColor=white)![enter image description here](https://img.shields.io/badge/MySQL-00000F?style=for-the-badge&logo=mysql&logoColor=white)

# Screenshots
![enter image description here](https://user-images.githubusercontent.com/53221408/152875431-c1e2541d-18ce-44be-95c2-1bc809034f91.png)   ![enter image description here](https://user-images.githubusercontent.com/53221408/152875426-2c05c55a-3e3d-4192-9393-8b6c065d558c.png)


# Deploy

O deploy pode ser feito diretamente em um SaaS como o heroku, recomendo utilizar o addon JawsDb para o mySqlm, ou pode ser feito o deploy em um servidor apache bastando configurar as variáveis de ambiente a baixo.
<table class="tg">
<thead>
  <tr>
    <th colspan="2"> Variáveis de ambiente</th>
  </tr>
</thead>
<tbody>
  <tr>
    <td>DB_HOST</td>
    <td>IP Servidor MySql</td>
  </tr>
  <tr>
    <td>DB_USER</td>
    <td>Usuario MySql</td>
  </tr>
  <tr>
    <td>DB_PASS</td>
    <td>Senha do MySql</td>
  </tr>
  <tr>
    <td>DB_PORT</td>
    <td>Porta servidor MySql (3306)</td>
  </tr>
  <tr>
    <td>DB_SCHEMA</td>
    <td>Data base a ser utilizada</td>
  </tr>
  <tr>
    <td>APP_TIMEZONE</td>
    <td> No formato "America/Sao_Paulo"</td>
  </tr>
  
</tbody>
</table>
No apache a configuração se da

    <VirtualHost *:80>
	    SetEnv DB_HOST valor
	    SetEnv DB_USER valor
	    SetEnv DB_PASS valor
	    SetEnv DB_PORT valor
	    SetEnv DB_SCHEMA valor
	    SetEnv APP_TIMEZONE valor
    </VirtualHost>

## Banco de dados
Arquivos de exemplo do banco de dados se encontram em `/app/Model/sqlFiles`
Rode as queryes do arquivo `DataBaseStruture.sql`


# A Fazer

- [ ] Painel de administração
	 - [ ] Inclusão de Shows 
	 - [ ] Mudança de tema
	 - [ ] Analise de acessos

- [ ] Front-end
	- [ ] Atualizar horários sem requests (Offline)
	- [ ] Time Line Atualizada conforme o show

- [ ] Calculadora da gastos
  - [ ] Adicionar produtos 