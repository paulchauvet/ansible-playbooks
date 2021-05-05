# ansible-playbooks

Ansible playbooks to go with documentation from 
These are some roles that I use for my CAS environment that are referenced in my [Deploying CAS](https://paulchauvet.github.io/deploying-cas/) guide.

There is no support or warranty for these.  It is your responsibility to review the code and test in a non-production environment.

## Included roles

* apache-tomcat (note: I run Apache Tomcat behind Apache httpd - so some config like AJP is dependent on that)
* cas6 (role for CAS6 - though there are LOTS of variables to fill in that are site specific.  Fill in - and encrypt - cas-vault.yml as per my guide)
* cas-client (an Apache httpd CAS client - using mod_auth_cas - for testing purposes)

