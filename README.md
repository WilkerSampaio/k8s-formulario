#  k8s-formulario

Olá, pessoal!

Quero compartilhar um projeto simples de aplicação web que desenvolvi com foco em praticar conceitos de DevOps.

A aplicação é containerizada e orquestrada com **Kubernetes**, composta por **Frontend**, **Backend** e **Banco de Dados MySQL**, com suporte a **Ingress**, **volumes persistentes**, **secrets** e **deploy automatizado**.

---

##  Arquitetura da Solução

```
┌────────────┐
│   Ingress  │
└─────┬──────┘
      │
┌─────▼──────┐        ┌────────────────┐
│ Frontend   │ ─────▶ │ Backend        │
│ (HTML/JS)  │        │ (API)          │
└────────────┘        └──────┬─────────┘
                             │
                    ┌────────▼────────┐
                    │ MySQL Database   │
                    │ (Persistent)    │
                    └─────────────────┘
```

---

##  Tecnologias Utilizadas

```
- Docker
- Kubernetes
- MySQL
- HTML / JavaScript
- Ingress Controller
- Volumes Persistentes (PV/PVC)
- Secrets Kubernetes
```

---

##  Pré-requisitos

- Docker
- Kubernetes (Minikube, Kind, K3s ou cluster cloud)
- kubectl
- Ingress Controller instalado (ex: NGINX Ingress)
- Windows (para uso do script-deploy.bat)

---

##  Banco de Dados (MySQL)

- Utiliza PersistentVolume (PV) e PersistentVolumeClaim (PVC)
- Garante persistência dos dados mesmo após reinício dos pods
- Serviço exposto internamente no cluster

---

##  Backend

- API responsável pela lógica de negócio e comunicação com o banco
- Configurado para acessar o MySQL via Service
- Deploy escalável via Kubernetes Deployment

---

##  Frontend

- Interface web baseada em HTML e JavaScript
- Comunicação direta com o backend via Service
- Exposta externamente via Ingress

---

##  Ingress

- Centraliza o acesso externo à aplicação
- Permite roteamento HTTP para o frontend

Arquivo:

- ingress.yml

⚠️ Certifique-se de ajustar o host do Ingress conforme seu ambiente.

---

## Como Rodar o Projeto com Minikube

- Verifique se o kubectl está conectado ao cluster do Minikube:

```
kubectl config current-context

```

Iniciando o Minikube:

```
minikube start

```

Habilite o Ingress Controller:
```

minikube addons enable ingress

```
Aguarde alguns instantes até o Ingress estar ativo:
```

kubectl get pods -n ingress-nginx

```

---

## Deploy Automatizado (Windows)

1. Abra o **Prompt de Comando** ou **PowerShell**
2. Navegue até o diretório raiz do projeto:
3. execute o script-deploy.bat

O script aplicará automaticamente todos os manifests Kubernetes na ordem correta, simulando um deploy automatizado em ambiente local.

---

## Acessando a Aplicação

Obtenha o IP do Minikube:

```

minikube ip

```

Adicione esse IP ao arquivo hosts do seu sistema, conforme configurado no ingress.yml.

Após isso, acesse no navegador:
```

http://formulario.local

```

