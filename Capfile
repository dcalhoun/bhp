load 'deploy'

#the domain name for the server you'll be running wordpress on
set :domain, "localhost"

#other domain names your app will respond to (dev.blog.com, etc)
#set :server_aliases, []

#the name of this wordpress project
set :application, "wp-capistrano"

#your repo
set :repository,  "git@github.com:dpcalhoun/wp-capistrano.git"

require File.join(File.dirname(__FILE__), 'lib', 'deploy', 'wordpress')

#Customizations
#==============

#if you've forked and customized puppet-lamp and want to use it to bootstrap your server,
#enter the URL to a tarball of your puppet configuration here
#set :initial_puppet_tarball_url, "http://github.com/jestro/puppet-lamp/tarball/master"

#if you've forked and customized puppet-lamp, enter the git clone url here.
#it's perfectly fine to bootstrap your server with the stock puppet-lamp 
#manifests, and then run a puppet:update_from_git to get your customizations
#set :puppet_git_repo_url, "git@github.com:you/your-puppet-lamp.git"

#if you need to use a different version of wordpress, specify that here
set :wordpress_svn_url, "http://svn.automattic.com/wordpress/tags/3.0.4"

#unless set here, we prompt you for these three on `cap setup:wordpress`
# set :wordpress_db_name, ""
# set :wordpress_db_user, ""
# set :wordpress_db_password, ""

# set :wordpress_db_host, "localhost"

# WordPress path. Unless set here, these variables *WILL NOT* be set in wp-config.php
# set :wordpress_home, "http://www.yourdomain.com"
# set :wordpress_siteurl, "http://www.yourdomain.com"

#these are randomized on `cap setup:wordpress`
# set :wordpress_auth_key, Digest::SHA1.hexdigest(rand.to_s)
# set :wordpress_secure_auth_key, Digest::SHA1.hexdigest(rand.to_s)
# set :wordpress_logged_in_key, Digest::SHA1.hexdigest(rand.to_s)
# set :wordpress_nonce_key, Digest::SHA1.hexdigest(rand.to_s)
