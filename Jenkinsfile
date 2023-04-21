pipeline {
    agent any
    stages {
        stage('Clone') {
            steps {
                git branch: 'main', url: 'https://github.com/CarlosMoralesR/Dockerfile-Laravel.git'
            }
        }
        stage('Build and Test') {
            steps {
                sh 'cd Tarea6Dockerfile && composer install && php artisan test'
            }
        }
        stage('Build Docker Image') {
            steps {
                script {
                    def tag = "${env.GIT_BRANCH}-${env.BUILD_NUMBER}"
                    sh "docker build -t sicei:${tag} ."
                }
            }
        }
        stage('Deploy') {
            steps {
                script {
                    def tag = "${env.GIT_BRANCH}-${env.BUILD_NUMBER}"
                    sh "docker stop sicei-app || true && docker rm sicei-app || true"
                    sh "docker run --name sicei-app -d -p 8888:80 sicei:${tag}"
                }
            }
        }
    }
}