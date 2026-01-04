@echo off
echo =================================
echo 1. Criando e Enviando Imagens
echo =================================

docker build -t shockley09/backend:1.0 backend/.
docker build -t shockley09/frontend:1.0 frontend/.

docker push shockley09/backend:1.0
docker push shockley09/frontend:1.0

echo =================================
echo 2. Infraestrutura e Banco (Base)
echo =================================

kubectl apply -f k8s-database/mysql-pv.yml
kubectl apply -f k8s-database/mysql-pvc.yml
kubectl apply -f k8s-database/mysql-secrets.yml
kubectl apply -f k8s-database/mysql-deployment.yml
kubectl apply -f k8s-database/mysql-service.yml

echo Aguardando banco de dados subir...
timeout /t 10 /nobreak > NUL

echo =================================
echo 3. Aplicações (Backend e Frontend)
echo =================================

kubectl apply -f k8s-backend/backend-deployment.yml
kubectl apply -f k8s-backend/backend-service.yml

kubectl apply -f k8s-frontend/frontend-deployment.yml
kubectl apply -f k8s-frontend/frontend-service.yml

echo =================================
echo 4. Igress
echo =================================

kubectl apply -f ingress.yml

echo =================================
echo Deploy finalizado com sucesso!
echo =================================
pause