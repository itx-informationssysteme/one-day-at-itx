FROM gitpod/workspace-full

#ARG NODEJS_VERSION_MAJOR=16

#USER root

#RUN a2dismod mpm_event

#RUN apt-get update && apt-get upgrade -y && apt-get install -y mysql-server php-xmlrpc php-pdo-mysql wget

# Install Yarn
#RUN mkdir -p /var/cache/yarn
#RUN apt install -y gnupg2
#RUN	curl -sS https://dl.yarnpkg.com/debian/pubkey.gpg | apt-key add - && \
#    echo "deb https://dl.yarnpkg.com/debian/ stable main" | tee /etc/apt/sources.list.d/yarn.list && \
#    apt-get update && apt install --no-install-recommends -y yarn

# Install latest composer v1
#RUN wget -O composer-setup.php https://getcomposer.org/installer && \
#	rm -f /usr/bin/composer && \
#	php composer-setup.php --install-dir=/usr/bin --filename=composer && \
#	chmod ugo+x /usr/bin/composer

#RUN echo "include \${GITPOD_REPO_ROOT}/gitpod_config/apache/apache.conf" > /etc/apache2/apache2.conf
#RUN echo ". \${GITPOD_REPO_ROOT}/gitpod_config/apache/envvars" > /etc/apache2/envvars

#RUN echo "!include \${GITPOD_REPO_ROOT}/gitpod_config/mysql/mysql.cnf" > /etc/mysql/my.cnf

#RUN mkdir /var/run/mysqld
#RUN chown gitpod:gitpod /var/run/apache2 /var/lock/apache2 /var/run/mysqld

#RUN addgroup gitpod www-data
