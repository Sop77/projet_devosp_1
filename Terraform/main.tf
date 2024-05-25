# Fichier : main.tf

terraform {
  required_providers {
    kubernetes = {
      source  = "hashicorp/kubernetes"
      version = "~> 2.0"
    }
  }
}

# Déclaration du provider Kubernetes
#provider "kubernetes" {
 # config_path = "~/.kube/config"
#}

#provider "kubernetes" {
 # config_path = "C:/Users/HP/.kube/config"
#}

provider "kubernetes" {
<<<<<<< HEAD
  config_path = "C:\\Users\\HP\\.kube\\config"
=======
  config_path = "C:/Users/HP/.kube/config"
>>>>>>> 96cb62eb805d2a1e61f2be1b32155c6f3e3e2fb6
}


# Récupération du contenu YAML pour le déploiement PHP
resource  "kubernetes_manifest" "php_deployment" {
  manifest = yamldecode(file("../php-deployment.yaml"))
  
}

# Récupération du contenu YAML pour le déploiement MySQL
resource "kubernetes_manifest" "mysql_deployment" {
  manifest = yamldecode(file("../mysql-deployment.yaml"))
  
}

# Récupération du contenu YAML pour le service PHP
resource  "kubernetes_manifest" "php_service" {
 manifest = yamldecode(file("../php-service.yaml"))
 
}

# Récupération du contenu YAML pour le service MySQL
resource  "kubernetes_manifest" "mysql_service" {
  manifest= yamldecode(file("../mysql-service.yaml"))
  
}
