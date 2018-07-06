### computer security

* Client : macOS high sierra 10.13.2
* Web Server : ubuntu 16.04
* Hacker Server : ubuntu 16.04  
* homepage : html & homepage


* XSS 공격을 막기 위해 홈페이지를 구축할 때 패턴 매칭 기법을 추가하여 XSS 공격을 차단시킨다. 
* 기존의 나와있는 모든 XSS공격들의 패턴들을 분석한 후 패턴에 대한 조건 문을 추가하고, 만약 게시글에 각 패턴과 일치하는 글이 들어오면 자동으로 XSS공격으로 인지하고 공격을 차단 한다. 추가적으로 Http(url) & img 패턴에 대해서는 유효성 을 확인하여 해당 형식에 맞지 않을 시 공격으로 인지하고 차단을 하도록 한다.
* 웹 서버의 안전을 위해 서버에 방화벽을 작동시켜 한번이라도 XSS 공격을 시도 할 시 자동적으로 공격자를 차단하는 Rule이 생성되고 방화벽에 적용을 하여 접속을 차단시킨다.

