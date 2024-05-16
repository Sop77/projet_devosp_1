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
provider "kubernetes" {
  config_path = "C:/Users/HP/.kube/config"
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
