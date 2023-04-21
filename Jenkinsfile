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
                bat 'cd Tarea6Dockerfile && composer install && php artisan key:generate && php artisan test'
            }
        }
        stage('Build Docker Image') {
            steps {
                script {
                    bat "cd Tarea6Dockerfile && docker build -t sicei-%GIT_BRANCH%:1.0.0-%BUILD_NUMBER% ."
                }
            }
        }
        stage('Deploy') {
            steps {
                script {
                    def tag = "${env.GIT_BRANCH}-${env.BUILD_NUMBER}"
                    bat "docker stop sicei-app-container || true && docker rm sicei-app-container || true"
                    bat "docker run --name sicei-app-container -d -p 8888:80 sicei:${tag}"
                }
            }
        }
    }
}