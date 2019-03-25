  function aesCBCEncrypt(key, iv, text){
    var aesCbc = new aesjs.ModeOfOperation.cbc(key, iv);
    textBytes = aesjs.utils.utf8.toBytes(text);
    return aesCbc.encrypt(textBytes);
  }
  
  function aesCBCDecrypt(key, iv, encryptedHex){
    encryptedBytes = aesjs.utils.hex.toBytes(encryptedHex);
    var aesCbc = new aesjs.ModeOfOperation.cbc(key, iv);
    return aesCbc.decrypt(encryptedBytes);
  }
  
  function aesECBEncrypt(key, text){
    textBytes = aesjs.utils.utf8.toBytes(text);
    var aesEcb = new aesjs.ModeOfOperation.ecb(key);
    return aesEcb.encrypt(textBytes);
  }
  
  function aesECBDecrypt(key, encryptedHex){
    encryptedBytes = aesjs.utils.hex.toBytes(encryptedHex);
    var aesEcb = new aesjs.ModeOfOperation.ecb(key);
    return aesEcb.decrypt(encryptedBytes);
  }