Role Name
=========

This is a role meant to install a CAS client into Apache httpd.

It is for testing only - it is not meant for production use, though
I'm sure it could be modified to be used in production.

Requirements
------------

For now at least this requires RHEL 7 or 8.  It could be adapated to CentOS with minimal changes.  Ubuntu/Debian would take more work.


Role Variables
--------------

The only variables are in 'dev-cas-client.conf.j2' and 'test-cas-client.conf.j2' in the templates.  They are looking for the public facing CAS server name.  They're defined in vars/main.yml

Dependencies
------------

You need a CAS server up somewhere - with service definitions (that match your cas client) in place to use it.

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

