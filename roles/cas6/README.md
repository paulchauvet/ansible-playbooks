Role Name
=========

This is a role meant to install Apereo CAS 6 on one or more RHEL hosts.  The role will:
 - setup prerequisite dnf packages
 - push out the cas.war file (which you have to place in the files directory)
 - push out CAS configs including services

As of now - it will NOT clean-up services (i.e. if you push a service out via Ansible that you don't need anymore, you won't get it updated anymore if you delete the service from the role, but it won't delete that service from the CAS hosts.  You have to, for now at least, do that manually.

It has only been tested with Tomcat 9.0.x.  An earlier version worked with 8.5.x with basically no changes.

Requirements
------------

 - For now at least - this assumes RHEL 7 or 8.  It could be adapted to CentOS with minimal changes.  Ubuntu/Debian would take more work.
 - Ansible
 - Apache Tomcat
 - Apache HTTP or some other server in front of Tomcat (not needed - but if you're not using this you will want to remove
   references to AJP in tocmat configs)
 - carefully review the dev-cas.properties.j2 (as well as TEST/PROD) for your own environment.
 - The tasks assume in some places the hostname conventions we use here (for example, login6deva and login6devb as the two CAS Dev tier servers.  If you don't name your servers like this - you'll have to update the conditional/when statements in the tasks.)
 - The 'push-saml-files.yml' have hard coded file names for our SAML certs/keys/metadata.  You'll want to replace these with your files.  It wasn't worth making those as variables (yet) for us.

Role Variables
--------------

There's a ton of these - not going to replicate how to create them here.  See https://paulchauvet.github.io/deploying-cas/.  They're listed in cas-vault.yml which for the purposes of this public repo is NOT encrypted.  It should be though using Ansible vault.

Example Playbook
----------------
The example below is from my CAS hosts and uses other roles, some of which are in this repository (others may be at some point).
The simplesamlphp role is there for legacy purposes as I haven't moved some things out of it yet.  The security-hardening role is something I made based on Center for Internet Security benchmarks (and a few other things).

# CAS 6
- hosts: login6deva, login6devb, login6testa, login6testb
  roles:
    - security-hardening-rhel8
    - apache-tomcat
    - apache-httpd
    - cas6
    - cas-client
    - simplesamlphp


License
-------

Creative Commons Attribution-ShareAlike 4.0 International License

Author Information
------------------

Paul Chauvet, chauvetp@newpaltz.edu

