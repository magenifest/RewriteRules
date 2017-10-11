# RewriteRules for Magento 1
This module will add a custom router before Magento's routers (admin, frontend, cms, default). This router will try to find the request's url in the list of url rewrite values and trigger a redirect.

This module is useful for cases where temporary redirect of product / category url is required (for example to a coming-soon page).

Sample configuration:  

[[https://github.com/magenifest/RewriteRules/raw/master/sample-configuration.png|alt=magenifest-rewriterules-configuration]]
