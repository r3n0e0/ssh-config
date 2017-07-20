SSH-CONFIG
==========

A ssh config parser in PHP

[![Build Status](https://travis-ci.org/r3n0e0/ssh-config.svg?branch=master)](https://travis-ci.org/r3n0e0/ssh-config)

Example
-------

```
use SshConfig\Config;
$config = Config::parse(file_get_contents('<filepath>'));
var_dump($config);
```

<details><summary>Result:</summary>
<pre><code>
array(2) {
  [0] =>
  array(2) {
    'Host' =>
    string(5) "hello"
    'Config' =>
    array(4) {
      'HostName' =>
      string(11) "example.com"
      'User' =>
      string(3) "wow"
      'Port' =>
      string(2) "22"
      'IdentityFile' =>
      string(19) "~/.ssh/id_rsa_hello"
    }
  }
  [1] =>
  array(2) {
    'Host' =>
    string(1) "*"
    'Config' =>
    array(3) {
      'PasswordAuthentication' =>
      string(2) "no"
      'ChallengeResponseAuthentication' =>
      string(2) "no"
      'HashKnownHosts' =>
      string(3) "yes"
    }
  }
}
</code></pre>
</details>

License
-------

MIT
