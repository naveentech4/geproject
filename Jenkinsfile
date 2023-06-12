pipeline {
    agent any
    
    stages {
        stage('Sonar Analysis') {
            steps {
                echo 'test hook..'
            }
        }


        stage('Build LMS') {
            steps {
                script{
                    echo 'Building..'               
                }                
            }
        }

        stage('Release LMS') {
            steps {
                script {
                    echo "Releasing.."                         
            }
            }
        }

        stage('Deploy LMS') {
            steps {
                script {
                    echo "Deploying.."  
                    sh 'sudo rm -rf /var/www/html/*'
                    sh 'sudo cp -r * /var/www/html'                    
            }
            }
        }

    }
}
