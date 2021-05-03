Role Name
=========

This is a role meant to install Apache Tomcat on a RHEL host.  The role will:
 - setup prerequisite yum packages, and the tomcat user/group
 - setup the version of OpenSSL & APR as specified in vars/main.yml
 - install the version of Tomcat specified in vars/main.yml into /opt/tomcat/apache-tomcat-{{ tomcat-version }}

It has only been tested with Tomcat 9.0.x.  An earlier version worked with 8.5.x with basically no changes.

Requirements
------------

 - For now at least - this assumes RHEL 7 or 8.  It could be adapted to CentOS with minimal changes.  Ubuntu/Debian would take more work.
 - Ansible


Role Variables
--------------

Tomcat, OpenSSL, APR, commons-native-daemon, and tomcat-native-library versions are specified in vars/main.yml
For now at least - the only way I know of to determine the appropriate commons-native-daemon and tomcat-native-library version is to manually specify them.

Dependencies
------------

No other dependencies known - though using a regular Apache HTTPD role in conjunction is advised.

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

