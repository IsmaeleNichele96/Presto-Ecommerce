

Per impostare google AI:

1- in console scrivere ->  composer require google/cloud-vision -W;
2- creare file nell'explorer con nome "google_credentials.json";
3- copiare all'interno del file detto sopra: "{
  "type": "service_account",
  "project_id": "nuovo-presto",
  "private_key_id": "310c2752d3bbeadb5e10ebae7f75bea01b229a8b",
  "private_key": "-----BEGIN PRIVATE KEY-----\nMIIEvAIBADANBgkqhkiG9w0BAQEFAASCBKYwggSiAgEAAoIBAQCtj6dDK+yCS2Pt\nCn1834WDJDYlVSkHP5p5o6tWi6wSBPUjrRgpGkWVi8IO/AnXUpvkSWwi9xXS5+Kf\nYJY8wdwk0WB9ba4BTVxvUGwplyqKBnuxvJovquR3Jsj9lDNhWZDeEiWne/4mfSNb\n52zie2W0+Li6iAuc8uvvRAo35K3kt5vzyvPIOtl/U00D2I8JjT9pcw6tUUksgnaK\nwc+5vkuV1Wi/WmgZQJerO5gi2VAoiFx9BQyYI9IZup6dHK0rj6/DZhJ73L7aeaN6\n3cIuOPi8jy0z0O89HtM/4NOG0iIf+B8annbbyG9ATH/9NBqZeBTAlnyeEuZDjNF8\nY2b1uskXAgMBAAECggEAA3ghocgY/CnBn5VcGMjnBE4O/wQKw+hTkCbjX+F+2QVc\nWRA2sWujBHA8usvy7mjqUM/e53wE5ahY8VKe7iv52IqO4TL2DXScamUzJEmvQf8L\nLexVMKq70l3mGpuBw2pk6Ot38TcbR22s7UNc+9H3oHxwRNo/US3R5YB4q9FYYH/6\nnhRrgj80vX/zvrBBDlhnzCbuLlASpLDCeMzjyTW1nvkveShYhEQoIeaX1fHIsCdb\nudhzRfUj/erTUqvZ9MG/KhrK6Q92UqD118eXOOxDy9yXZkpUP48iB+iN0IW4sRYh\nV//gJYiaL07+oimotOJjg6krMUfrLRg0Xma2itXmUQKBgQDhKJYPw9Z7h2g6iSMk\n4Ife5K4Sd2vI8arOWIyESICzUlDez7CyaHjIRF4Yhck/DRedFF2kLso5L0AS+Vy8\n0mcnsofsnTpyrogrpHF3Su5JIlI+0j7w6TAVJIRnHhtJFP3UYYISHgQqMql5zTmN\nzw06Y1jwIwUXsgcbt3iSp/S9swKBgQDFVcCAOQQHEGflzGTznmDOPFJnctFhmF6p\nEFRygcElOTLEGrDO+bxl3SXa9we8TqGgTBaUGxnmfH42JONh9rmMZOgchKsEPUfA\nY6B4H/jcIiypB7rtJxtg4i8j5LN73XrLSLOes3VgCeOGKBrR3PayGRnQyi1gJ1W9\n28PzqMC9DQKBgFkoOBuwAZtSqAwdx6PPoR260c8QKMceIvOojqPHDed0Hf/Mn/xV\ncBZlNBljyKfF6GbT7KyZtovkUOvygC1o514JzNb9/2nwAI2/hQqmyip9g7HKkQ/W\nVqrYlfE7M7TBsi1KGzZPWnjXLNLFWBf2OBe5xTr5sweKAFSSVxVDmp8PAoGAJUSJ\no22hJhhiFtMgKaY6kBhyU5kqk+zry7AK0slQidAgl0qXI6+kdfRrBsxqiJStD5Hv\nHa90l8PhLiaPTtwCtNIFyAUCKz3LhDkMgENBg4lst8t+8PTWxdhRoMy7XOQ6IZQs\nYAdyXl3fu2Ftlz7M1FvLNVRJd4RWPBH6EtVG+S0CgYAHDAsARo5vH/tLjixpvHBe\ngUawK779a/LdCM0h991PdHSuv8qJxzW2+7yTiIqkfrCLlpvN5KYRoU6suFsmElth\n/p+JS3FphUWzm0e5pd7WnxvlGRPnHwcHsLUyEaoyt0F93cTShBjr0FWsW+rQdM2I\nnrQcswJx0vkEnTM+uTs2MQ==\n-----END PRIVATE KEY-----\n",
  "client_email": "presto2024-782@nuovo-presto.iam.gserviceaccount.com",
  "client_id": "112246177284394190877",
  "auth_uri": "https://accounts.google.com/o/oauth2/auth",
  "token_uri": "https://oauth2.googleapis.com/token",
  "auth_provider_x509_cert_url": "https://www.googleapis.com/oauth2/v1/certs",
  "client_x509_cert_url": "https://www.googleapis.com/robot/v1/metadata/x509/presto2024-782%40nuovo-presto.iam.gserviceaccount.com",
  "universe_domain": "googleapis.com"
}" ;

4- andare nel file php.ini nella cartella di php, andare a riga 1945, togliere il punto e virgola e aggiungere il percorso della cartella copiandolo dall'esplorare risorse (esempio: "C:\Users\PhP\PhP 8.2.12") e aggiungere alla fine, all'interno delle virgolette \cacert.pem (esempio completo "C:\Users\PhP\PhP 8.2.12\cacert.pem");