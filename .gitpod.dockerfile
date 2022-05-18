FROM gitpod/workspace-full

USER root

RUN a2dismod mpm_event

RUN apt-get update && apt-get upgrade -y && apt-get install -y software-properties-common gnupg2 dirmngr apt-transport-https mysql-server php-xmlrpc php-pdo-mysql wget
RUN apt-key adv --fetch-keys 'https://mariadb.org/mariadb_release_signing_key.asc'
RUN add-apt-repository 'deb [arch=amd64,arm64,ppc64el,s390x] https://mirror.mva-n.net/mariadb/repo/10.7/ubuntu focal main'
RUN apt-get update && apt-get install -y mariadb-server mariadb-client

# Install Yarn
RUN mkdir -p /var/cache/yarn
RUN	curl -sS https://dl.yarnpkg.com/debian/pubkey.gpg | apt-key add - && \
    echo "deb https://dl.yarnpkg.com/debian/ stable main" | tee /etc/apt/sources.list.d/yarn.list && \
    apt-get update && apt install --no-install-recommends -y yarn

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
