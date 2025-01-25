# Projeto Full Stack (Backend + Frontend)

Este projeto contém duas aplicações: um backend e um frontend. Siga as instruções abaixo para configurar e iniciar ambos os serviços.

---

## Backend

    Construido utilizando PHP puro e com Domain Driven Design, CRUD para cursos.

### **Pré-requisitos**

- Docker e Docker Compose instalados.

### **Configuração**

1. Abra o arquivo `docker-compose.yml`.
2. Configure a variável de porta para o backend, se necessário. Por padrão, a aplicação utiliza a porta `8080`.

### **Iniciar o Backend**

Execute o comando abaixo na raiz do projeto:

```bash
docker compose up -d
```

Este comando irá:

- Construir a imagem Docker do backend.
- Iniciar o serviço em background.

### **Acessar o Backend**

Após o backend ser iniciado, ele estará disponível no endereço:

```
http://localhost:<PORTA_CONFIGURADA>
```

Por padrão, a porta configurada é `8080`
