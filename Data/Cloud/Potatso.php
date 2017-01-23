<?php

/*
 * License: MIT
 *    Time: 2017-01-20 10:57:22
 *    Name: Potatso.php
 *    Note: CloudGate Potatso Cloud Rule
 *  Author: Eval,BurpSuite
 */

# 触发下载
header('Content-Disposition: attachment; filename='.'Potatso.Conf');

# ClouGate控制器
require_once "../Controller/Controller.php";

# Cloud配置信息
echo CURL(true,Cloud($ConfigModule,$Potatso_Config_Module,$Cache).$ConfigFile).$CURLContent."\r\n";

# CloudGate模块
echo "# Default\r\n".Replace(CURL(true,$RuleList['Default']).$CURLContent,false,false,true,false,false).$Potatso_Default;
echo "# PROXY\r\n".Replace(CURL(true,$RuleList['Advanced']).$CURLContent,false,false,true,false,false).$Potatso_Advanced;
echo "# DIRECT\r\n".Replace(CURL(true,$RuleList['DIRECT']).$CURLContent,false,false,true,false,false).$Potatso_DIRECT;
echo "# REJECT\r\n".Replace(CURL(true,$RuleList['REJECT']).$CURLContent,false,false,true,false,false).$Potatso_REJECT;
echo "# KEYWORD\r\n".Replace(CURL(true,$RuleList['KEYWORD']).$CURLContent,false,false,true,false,false).$Potatso_KEYWORD;
echo "# IPCIDR\r\n".Replace(CURL(true,$RuleList['IPCIDR']).$CURLContent,false,false,true,false,false).$Potatso_IPCIDR;
echo "# Other\r\n".Replace(CURL(true,$RuleList['Other']).$CURLContent,false,false,true,false,false).$Potatso_Other;

?>