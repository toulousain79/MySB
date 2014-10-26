<?php
/** Adminer Editor - Compact database editor
* @link http://www.adminer.org/
* @author Jakub Vrana, http://www.vrana.cz/
* @copyright 2009 Jakub Vrana
* @license http://www.apache.org/licenses/LICENSE-2.0 Apache License, Version 2.0
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU General Public License, version 2 (one or other)
* @version 4.1.0
*/error_reporting(6135);$bc=!preg_match('~^(unsafe_raw)?$~',ini_get("filter.default"));if($bc||ini_get("filter.default_flags")){foreach(array('_GET','_POST','_COOKIE','_SERVER')as$X){$Hf=filter_input_array(constant("INPUT$X"),FILTER_UNSAFE_RAW);if($Hf)$$X=$Hf;}}if(function_exists("mb_internal_encoding"))mb_internal_encoding("8bit");if(isset($_GET["file"])){if($_SERVER["HTTP_IF_MODIFIED_SINCE"]){header("HTTP/1.1 304 Not Modified");exit;}header("Expires: ".gmdate("D, d M Y H:i:s",time()+365*24*60*60)." GMT");header("Last-Modified: ".gmdate("D, d M Y H:i:s")." GMT");if($_GET["file"]=="favicon.ico"){header("Content-Type: image/x-icon");echo
lzw_decompress("\0\0\0` \0„\0\n @\0´C„è\"\0`EãQ¸àÿ‡?ÀtvM'”JdÁd\\Œb0\0Ä\"™ÀfÓˆ¤îs5›ÏçÑAXPaJ“0„¥‘8„#RŠT©‘z`ˆ#.©ÇcíXÃşÈ€?À-\0¡Im? .«M¶€\0È¯(Ì‰ıÀ/(%Œ\0");}elseif($_GET["file"]=="default.css"){header("Content-Type: text/css; charset=utf-8");echo
lzw_decompress("\n1Ì‡“ÙŒŞl7œ‡B1„4vb0˜Ífs‘¼ên2BÌÑ±Ù˜Şn:‡#(¼b.\rDc)ÈÈa7E„‘¤Âl¦Ã±”èi1Ìs˜´ç-4™‡fÓ	ÈÎi7†³é†„ŒFÃ©”vt2‚Ó!–r0Ïãã£t~½U'3M€ÉW„B¦'cÍPÂ:6T\rc£A¾zr_îWK¶\r-¼VNFS%~Ãc²Ùí&›\\^ÊrÀ›­æu‚ÅÃôÙ‹4'7k¶è¯ÂãQÔæhš'g\rFB\ryT7SS¥PĞ1=Ç¤cIèÊ:d”ºm>£S8L†Jœt.M¢Š	Ï‹`'C¡¼ÛĞ889¤È QØıŒî2#8Ğ­£’˜6mú²†ğjˆ¢h«<…Œ°«Œ9/ë˜ç:Jê)Ê‚¤\0d>!\0Z‡ˆvì»në¾ğ¼o(Úó¥ÉkÔ7½sàù>Œî†!ĞR\"*nSı\0@P\"Áè’(‹#[¶¥£@g¹oü­’znş9k¤8†nš™ª1´I*ˆô=Ín²¤ª¸è0«c(ö;¾Ã Ğè!°üë*cì÷>Î¬E7DñLJ© 1ÊJ=ÓÚŞ1L‚û?Ğs=#`Ê3\$4ì€úÈuÈ±ÌÎzGÑC YAt«?;×QÒk&ÇïYP¿uèåÇ¯}UaHV%G;ƒs¼”<A\0\\¼ÔPÑ\\Âœ&ÂªóV¦ğ\n£SUÃtíÅÇrŒêˆÆ2¤	l^íZ6˜ej…Á­³A·dó[İsÕ¶ˆJP”ªÊóˆÒŒŠ8è=»ƒ˜à6#Ë‚74*óŸ¨#eÈÀŞ!Õ7{Æ6“¿<oÍCª9v[–MôÅ-`Óõkö>lÙÚ´‹åIªƒHÚ3xú€›äw0t6¾Ã%MR%³½jhÚB˜<´\0ÉAQ<P<:šãu/¤;\\> Ë-¹„ÊˆÍÁQH\nv¡L+vÖÃ¦ì<ï\rèåvàöî¹\\* àÉçÓ´İ¢gŒnË©¸¹TĞ©2P•\r¨øß‹\"+z 8£ ¶:#€ÊèÃÎ2‹ºJ[i—‚£¨;z˜ûÑô¡rÊ3#¨Ù‰ :ãní\rã½ƒeÙpdİİ è2cˆê4²k¿Š£\rG•æE6_²ªÊØŞ‰b‹/Œ«HB%ò0ë¢>ÈÈğhoWÃnxlÖ æµƒCQ^€°ĞÔÿßñ\r„Š¾¶4lK{şZÆü:†ĞÜÃƒŸ.¦p¨§Ä‚éJóB-Å+B”´‘(ëTòŸ%®µJ›0ªlØT¶`+É-Á¾@BÚáÛ„Vá’Ä\0ÂÏC¼,ì¯0tâàŒF‡‰å?Ä Ë\na@ÉŒ>‚âZEC“ôO-æ›¤^Q€&ßÖù)I)®¤ÄÀR„]\r¡”9”7_ˆ¢\rÉF80µObù	€‘î>ºäı\nRı_ˆÑ8æ‚ØÙ«äov0¤bCA¸F!Ñt—–Äƒ%0”/‘zAYO(4«‹¡ˆ¨Ò	'Ÿ] Iéí8hHÂ05˜3ò@x&nˆ’|TÓ³³)`.“s6eY˜D¦z¸Œ®¥ƒJÑ“ô.„ñ{GEb¹Ó‹¡˜‹†2Õ×{\$**ı¾@İC-:zYHZIôà5F]¦²YúùCªOêAÂÚó`x'´.*9t'{ÿ(êšwP¶¾ Ñ=¢*‰†ú*üxwråÔ*c‚Ìc|„DŸ“ÚV—–\r†V.‡0âÆ™V¤dˆ?Ò€üê,EÍ`T¦É6Ûˆ-“Åì¾ÅÚT[Ñªz©‚.Ar±£Í€Pøºnƒc=aÔ9Fònß!ÙuáÎA©Şƒ0iPó¬”îºJ6eäT]VØ[\rXÌáaŸ–vkõ\n+EˆáÜ•*\0¶~¶Æù@g\"ÌNCI\$àÉŒƒ€êx@WÃy¼*vuDÙ\0ŞvœëŒ†V\0èV`Gç½uµE®Ö•ÂÁf“l˜h’@ï)0@šT•°7‹íÛÂ§RAÊÙ·ò´3Û˜Ğ«/QÇ]ª,sÖ{VR±¡öF«¡A˜„<¨v×¥î´%@9‚ÀF¢Õ5t‰%Ö+º/¢8;¾WÑäÚÇJïĞo:ÖNÿ`ø	•ÿš´hìÁ{Ü£•î ËÔ8ÔEuª&°W|É†„‰®Uú&\r\"ÔÁ»‰|-uÇ†…Në¶:nc²©fV­‹ÂÃè#U20å>\"®²Ç>Ì`œk]î-¯ÇxùSØÍ‡Ğ¢©‰‚êcâ¡óB’—}Ø&`ˆîr+E­“\$œyNıŒ±b,†´´Wx ş-9åÕrÓ,’ü`å+œïíËŠù’CœÓ)˜˜7Ûx\r¬şWµfMŒSR¼\\èz¦ÙQ²Ì“”uA¬ºê2±õ4îL&ËHi Âµ°²¹S\$)e³“æg rÈŒ©ƒ\$]ZëiYs¤õ×kW–n>µ7E1k8ĞdÃró®škÁı¢ëEŞÙÛwÂwcmTy¹•ë¿a›\$tx\rB´÷=Šö¢*”<Èƒ l¡fôKœ‘N/¶¼	ÃlÕáükH“õ8 .‘‘ù?f÷›Úÿã6†Ñ‡¼{gi/\"à@–K›ñ@2ãça|#,Z¤±‡	³ñwˆd¬™“²…¼å6w™^&Áêt™çœP±…¥Äù]À¼›.àãÚí¡TìîkroÀ‰÷\ro=—%æ×h`:\0á±‚ö«”|êŠ£«a“Ô®6*:ÍÓ*‡ÊrO-^–’ñén«Íó§MÆ}æ»÷ÆAya±İ\nƒu^ì–ÀrnO\r±»¡`şT~</ğ¶wÄyş}æ:›|£ÏĞûÖÌ¡6»¤×ø®Ÿvî\rc<·b#ûàô§†î–\$ùsµê|ç‡‡V)«h‹TCùñ(Ä½ñ£È}");}elseif($_GET["file"]=="functions.js"){header("Content-Type: text/javascript; charset=utf-8");echo
lzw_decompress("f:›ŒgCI¼Ü\n0›†S‘Øa9œÅS`°Çˆ“Œ&Ó(°Ên0˜†QIìÒf‰›\$±At^ sG²Étf6eŒ§yŒÊ()LäSÁÀP'…ÂáÌR'Ífq]\"˜s>	)â‘`œH2ŠEq9ˆÊ?ˆ*)‰”t'°Ï§Ø\n	\ræs<ŒPi2INÆ*(=2ÌgXá¸è.3™N„Y4èB<’L—üîi©Ì¥2İ´z=š0HøĞ'·êŒšÃuÆtt:œÂ¡Èêe¹]`pX9ŒŞo5šgòóIœÜ,2O4ãŞÑ…MÆS¸(ˆa…Š#¾Äàç’ïø|¹G‚bèôüxœ^Z[Çä™G¼ÎuTvª(Òm@Vò¸(†¼ÈbN<ŠÈ`æâXä1É+Œä9J8Â2\r£K¶9ğhå	 Áè`…‹ÆëI8ä›±S±ãt÷2ƒ+,£ÆIºã £pæ9aèØÅ< \\8Czôã\rŠ¨^òÈ]Ä1\\7C8_Ep^ÂĞÀéM1Àw\"'4fSX9ES|ä›…Ãk3ÄB@ÊæXa=No4t7ƒdD3µpŞÑàæ:)\\;° ĞÔğ\r)8HÔÅ44Pc=\nÔ!pdÇÕQN\rÌHï'ô¸š2¢#\"Õ¥m-¶b,Ç	ƒM.¡‰-IKÓ)ÀÉe'•\"ƒ´¤>2XÑÅ“eÄj:9^²1c„»È:YÉ@ËuËã“›4òXÇ& Ò|£)Ñ’´±-K‘xŒëªÂSğè1Óó\$â¡@\\…!x]\0Œ£ÕÎÀÂñ¤áF†COÄ:à1K‡Å*†F4aˆ»¼k˜úÈKÏš¾‘»ö2l¬pÌ3J<Èâ,2Øà8#ã †Õ\rŒÜášÜî ó¤h¬„·áF±Œİ‰2PëèŒŠl(È\$Ö°\nJÛ·-ŞÊÇ°cc~¹FÔîrøátbŞû½m{hğ.‡{ƒtkÛBµKc£z4ŒCª9…Û«~>ƒØúÈÚ`Æ“¹C Âs:âİÔ!cÅÙ®Úµ”*WÉHX:WÌ;Nà ¨j*/(á_p3ª¡HIãKlÉn!trã£Gã­º¤tCƒ	vƒ?mã¤£¾ Ÿ¢–\0CÙö¨§oÜ¥cbf6Işû'\ríbåÅ7h§`‚È9½iìd5’—taMè={É©ğ»`NoK‰	!d4ĞƒzWXdmH°š*€ÆÛS ]ÏĞ3&\0Ú°	d%A´-²…	Âì(„šÙùQĞ}ø‚èU!t7°ä‹†˜>x‹‘t{mY¹„0Ş@^±€\"Ñ=‡³Î@t\r¡°ÎÄ+Y§.¼·¼X¿\n«I'KTŸ€^(ìD.@öÜø++@¼3•ÒÔX‹	aEì!,Yéö2-432ÔŒõMOàÖI\$q%	Ä‹G¦X9™‡Â[R\0nÁĞ¸Â PŒJy\r òBÈp\\HÃpgSÉ¼±Faejk—.4¸†C.^ yi‘ˆ9‡PÄˆe\"Î”NY¬¢BHÃ#8ÑB1\"¶j\\Ú©x‡ğ#¾â@G 9†2¨Âf.ĞŒpsršTJ xÚk˜–È4KIlÈfù8z¤¥KÈ‡>AKñŸ¡n^’Ø=&ŒƒAÀ*?'³^%;ğî4Ü€³†Œ9¤Q’“hâN‡™>MÊ=['vHIİJ§‘“ÙvÆâ’RÊtƒó<Ÿ”Ò²Å^¢¼zÔÂ‰B^öhâ'µ‚É©Ğ)-'#”¤9JTÁ)Ø@jO!¨Úc,e˜j–¤–‡@H,‰ÂØjˆa™©vZŒ>­¡Ò·µ)E`\0\n‡áTPó8L<‰c•:F˜æ‰\$\nƒííœ†ÃÏCHm\"j‹y·AÛS¶ ÜSªQ„ğœÎÎ{T']WªUÚ)_L¥˜i¬mˆOš‚¥è„şÔP:g¡{¸’ZÄ—ø.ÿ{”¨‡Dh\n»ÑÁ‡a­\r]9¥tÜà!XA½[È°¦ã—Cœ»×\n:•”haœÎÚå\"İ¢a2Lmƒ·Í\\	ûëp5÷@ú«@m£ì|Wö•ÀÂ%È|u®áÈ+hKÃL&¢Ï Ş3ü.XWÜÙººÈñ*qƒÛcÃé‡%.K¿“Š_”)®uÔ2W\$O]…d8’ê»gÁ?mFyúly¢%Ó‰ö²ÍÜDQÇ.uÄ²ñ‡Æ¹ø‚ÉÛL‚ı,Ş¬†è3ğæjƒ0t	a”<¬\0Pr•mNs8ÙŒk>M9, †á±ëBÁş±xÖáƒ£zoä¸™uB?`é¬§&ÂIÉ<¯¥ÍÑeÅYåsÊzÔ‡*±.'t»µõ‚zÛ)m*4X=—tI=ınÑ¦yÌŞšééc2¥¡`öääØ.Y¬¿Ö:éÎK“N’µr06Ó_rJ‘ØkÃtOè|^Íˆ¡çz\nÏ¿é±•ˆ<W‹1n.¨X·`•‚gúVG4Zÿ­rë!İÏÈY[ŞÓÅz:LäDˆÂ@T	¡0Ô`Üƒ˜pjSn\"YÁÈg	á`÷}Äšğ÷‘¬\n\nä4®ˆ\rg‚¹O7Ü¿b§è”y¡Ì)¹E¯Ãß)w>Ü~urš³Ş29h‚tgB#¹•°²ôF‚p(é@¥`u0÷Ñƒ(flG¥a0bZ7J@İI_PZ‹‹yq^Ëà7î°¸çG‰3dƒ˜ĞêÑ3¶é“„0ƒÛàŸïŸ{Ö¸»øˆa6½P¾ƒ4W	d:¿ü„W\nêt4ï‹¾.ñşDÉy°È§»85‡«AMôL’Xw5Ùese³Ü÷C	#ıİËrrYë	Ç®!Âî€Âå”Ÿ@/\rÌ ›0¥wEl\"›OéWŒ<Q‘ÄÛ ñEkÀSQiÿdŸı\\kÙ¬ëü8×ëşHŒ²\"ëbL}×%½	¬Ñ-^ğ _âh\nF-.í2nj¬ÔËVMàxnj¾¦m\\\$°¨¬ñ*\n¶ÈÖ'¢~à¶ Z@º€¶ Vâº€L\"ãˆ†p†Ø5€ğO, ÿË¹\0\nª-0¥\r4”pÔäbÕ0fÕp¶mg¤i©şO.(ÛP9ĞAPH+ĞNHpf¨§4?BàMğ®·ãJF¶.îô\0èà°Èà«Ôi…jÆ€Pş+(¯&æ»ãaŒÖ%l]'Üïl^@(œ5ƒN fs˜Ğûãô bz ÃÏe>îº¯p²¯øk éD\r4aNéÂY({ïD­ŒnÆ†ÏÕ¤>jÄ¨1€Ü	¨<çl-x³\rËGËO	Qw°•qw«c‚Pñb\r¤Ì¶ç­ê‹	Á½‘§âdñš6¢Ç€Ês‚à¢éæÁ Ğ¶±r½Äj>«¤J°âüÈ®±bâ3ê(F¦ÑzŞ¤Ğrª`Oñˆ¥ËX‘ÿ\rZ¶qü\r ì1\$ŸÏ¿gkìl­Ìr+°ñ†ækfì'ò5Ò8®4ë6Û\0Ê-´.i~4òE<\$²JÆlru2F;Bn<’%#lq%ˆû	b=âå#Lë(HJ1b%\rç¸¼ãz‹ô‹èG2£±^8wêñŒ‚^%¯” îş¾G­*g 7D\0^‘r²c„p’ÆL,€ó°ï* Xr§\$ Ê8ğ×,©*¨D‚ÓÀÔæ`Ğ\n„Á’Z¬“©s1lÏ1Ç\\{àÂ.I~`‡*3ÍÑì]1“FÍ‘1X	-£%#ËÀÁS3LÓl6\$Cr‰C/Âô\rÓ%,È|†“€ È†ÇŒ–Ü Êsu8«J˜©ä¬—9ò–æh¸ìNÅëÛÒë.ğüÉPôFtïÃ\$¾3\nğFB/ó=4÷-ìÌÍÔÍ9ì# O:Ió]#Å7Bº—,:ÉÍ< NâDñ@ÖRˆ®\n€Ò#ˆzÑ%8i:\0Úz“' Y‘*¯&Ôä¥/K¹Ö¦²«ÓU4 z€a>4‘\0 f*\0å*TK02Í<Í0SfòæÍ?Dôa4X-¶uÎj\$E6\0Næi´–ææ\nÿc9ñH’´²§HIb—ÈFÍÏÀ‹şs‚R~t»I”¾ 3úÒº‚Lè;%	0p.B®FBnMKÅÀR¢sDÆ'èa”èÅÔìÅÔóD\r1ÍOì\0œ²˜És´gL^Ì…àÌâO>lÚÀC<DôHº-4<àä™\"V]`¦/BŒğU&±Ó¹-#w;Ñ^›MĞürŠq±0œ-œo¨~pKÀ×‹	pšÎé\nqè,4ÁWÁ\$Fºnl\0ÙM‚Lš\n‰…-úm®\0¸)Z@ÏZ‰†˜ï•¢^@Î	 Â&ÕdÖäı]`¬ÆÖât\r¯„'\$^Rü'àO]©æSĞ¬Ø3î5â“˜F\"Q[uÉ[ÂH\$Ío`6Zuªğmo[•Í]ÍXÄTØ	™]µÒ•×\\c›b¶:–bæU\0ØW2Vb ëeˆ2/ºd%<YRt7ì'f§0‘uìruòhÇU@cTsÛVãÇgFÎ–{_-_P²E–‘T:{ÍVÖdüÉÂş-ˆIc¶ş°È¯ÍMëşÿiv¯ÿ J¡\0m3@JXµRMU_²ğºˆp²5)kçkl-\$,Æ“\r&›\rÜıO§(oÈûk+rê Õ\\àP7\"*^åP˜\rc <>³‚t#~Ræ\"»en‹ èƒsŠ„ã¶;·D	—ItÀËup t@À‚8d\0@ÔlTw×r —ww·~ b	¨ŒJ æóu®\n€ , u;jÖ·7s¦Ã{*„oÂ>q†<-\0 	à¦\n”œà‹|Â¹rcÆßv7µi7O{ECâ(èœ1Äp¶yÒ‡nØàğ¤²àZ‡à[r>8ÃX‚âç·á{¨¯~j…~¤î(à°¸(Y`È¯7_Â»z%vd™'‚%.‡\$w/.=Æpô&¶—¹…8V5R=ÃN„4†×(ˆøfuâç„øJlåjÜu`zXQ.–X!¾‹´‹—Økq—rpû˜~¦¸~T£ÀæiÂcÂfn¢x¸¾@S€Ë3*6Û¤b ÷ÜûØ¤İûrçppú¢n=)Æ­‹\0ğÈLú(L…ÆnË/§-88Çs\0zg½Ä\n‡ëL“KÉS!mÃ&–æŞç\"ÌÈ×b8}BXZy,Í¦d _X‹ğ€^\r1 zõªñ‘BuWŞ7Õ;s8ly^BªÂÀğ„fZ`Ş“ôä ø­‚FyYg–¬!–ñ	Plíš£O8ó„f<Ió,˜ ª\n@’‰ÀÛdp4j\0*¤\rl]œyÊ\rùÎ[=”İ?+À,'N¼˜}TYs\$w®fØÉ› Ô\räD(àM#\$İh¹_ey‘…Ê+²\"K4\0zYì DÆ]¢.Ê* xñÿ£Ï÷rLœĞ˜]\rj ^ç@éš)÷“¶\ròÀQrr'p0À¸à\\P¦,\"ª-sÉ’PÃŠøŸqôo‹w‹¸ñ¡ÅÅ¤'%ycÏÓvó,\rK«îÜP…U@èçˆÊAé2Ñå¢È¥q|ÒÒ	2\rœ\"ÃCi¯†?.¨šÉ@è‚<Ä€î0€ÜQôt‘ty=Dº[FÔpG\0RÙ³ü‚ÏÏ'Q@-6“2Á»*Á/@PÁÌÄd;7[ŠØ’!\"zÛS±-~o[„D!*–Æ®0N4	Š1ê—1ç8ñŸ{l\$DÖ	G¦|G\$v!ræ‚Ó-3Tm•Ä™‚\r°ïq0Ì½N˜·né™H”SF dùQRóå»Úc’ÂÍ‡Õ²S\rcC.nÀäiBx-l”v·@Üáá›!(“HçXÊc„g( ó#%ÁCnû(P‚G9Âì\"1Ü7ÀDGÛ²1ï€So8µÌSÄûqÜ.ˆ¤pôÏP h€e‚ª0Ö¬k+¸@ cÁRG§hÙ ¸LÈû†/âç`V.FA^\\lÜ¼öî5\0¸ `\0‚E|C®jImPtyÇAnGu'pÂd-åÄËÉ05püÓ&ÀIÄu%¢\nOÜ<|2\$úø@¨\rîFDRÎ^`1À±°f9Ğ`è/÷Ï ÊVÌü†;eø\0<<ğü€eÏdÏ²çÛ1Ò²‹Òè®¥kÏùêıD4V¤YÑƒÇÁÒì”åÂûw·¶ğ¡¬kpÖÇ;şrÃÆŠö^\niŒ™\0‘¬…¨c:˜¯)¼y¸\0zYvz9Ö]Üèâ«¡`WÃYÍëÖƒ…Í‹˜—‹Ø—Œpe«#ØÛ1ûñfãõİÚµŞ']Äµ€?]Ä‰-’Ööï=ôÏú˜æ8˜oT¨W=õàâ\rÔş\\Ñ­lÍÍy¶şİâœÕå¹àËÎÖŒq=!^„Ôâ…äfqêª€Z˜³”\0Vç]=ÏFæÉxšn`˜\rä?‚tğ XQÉ‘çştZnq<J\$cöàÜã<Â€íş’íàvñİkÀ¤•èeÖ®Ş\$¯^uë^ç)i¢íçŸ—ƒwÚnßª¿ªSÉ<˜>ÜæGŠ¥3À. é<•À7ŞİáÄœßmŞ¥Vşiw×î ó0ÿ/\n\r%1”\0yèKëñ¯EëÄ\ršúâ³šñŞ íü‰§¨Ş¸™eíNLêÇùæ:CÈ'?ê~óé6 €è\$}ıjf¬é•R\rõWD°÷.T\n¢èNÙTÿ}÷_÷E|í“—UÌ}ĞO'ÀØIŒ,Ê–7Í¿½€…:h±ØÚÌì„Ô\$ªZ0¸èDV”`t XnÒvójGÒsë9l°ÉËÒªB¸ã“€”rSF<;Øg%v(ªšÊ(Q¶×¥P(\nFlıè?j\0oİ€3±à{ÓdxìË¡‚üf—àbÄûW-Ş¸,QuÀ,+®Ëa.Y”Àñ‹l[¬õ%ÈWSxò²\\	¿D×G,„l”Ô]@LÄÂ\" ²|p…?l™Zaà8õÀ…0!Á/ôÂºoø\$vïÖáî`rß£îæG\0‚,Àë˜	Á0YPN€œ'0ˆÁUûWƒ0B˜ÄØ2Ag0gDÌMòB4Å&1Éšˆüá™w÷¤µ¶†Šô!™0¶„`-­7›F)+‚·(\0007(rË\$9­ LÅ€†¢‰üTãÁ…L€=\"°ÑKQ.N<X@¤}Í+ ˆ@‘È¦¡,…ˆ·…”áñf˜ø~½D/Å˜jhZÇŠ…ÀCp©Aš§2C‘ÀÃ f=`„*É|-ásÔK;,äê\rPxT\"}îöC5kÒ]OæµÓœ½Îùı!âmç_ÀF	P~ğ¡BRí½˜@\0l“_¾~µ«”„Á%bi}Î#\$ñkœ:aÙD‹³Ü!aR‰Ù´¢á#7¼Í‘ o˜[,™õ·İüG÷[¹Œ‘N“‘.®*P9‘Í¼wz c,ïg#·Ùè–qú>XHjZ†½sóí1êSx©E¢LÓˆ„<\"×Ø¥Zbˆ†­i†¦bÔDÆC•nN)(¢ÜXÉ5Â¼\n)14R”Mâs1ÕDÚMM\\ƒ¶ÂÆx³Ì;lõ‹ƒ@ŸL!@<lP«¥)¬`@Ù08;¨æbÀ‹0sCOÓDE”şêIDÌ[ªq¸ÃF!§nïcc‰\"“H¦Æ)ÂšePµb¦…±ö3ñK‹rI’‚5Z„Xr*É‚¸Å’-a:R‰ÌãC…»†±œ.Şg“¸¬ùã£¾…	‘DTQ‚ºH'×#€øËº=¸Í‰®");}elseif($_GET["file"]=="jush.js"){header("Content-Type: text/javascript; charset=utf-8");echo
lzw_decompress(compile_file('','minify_js'));}else{header("Content-Type: image/gif");switch($_GET["file"]){case"plus.gif":echo"GIF89a\0\0\0001îîî\0\0€™™™\0\0\0!ù\0\0\0,\0\0\0\0\0\0!„©ËíMñÌ*)¾oú¯) q•¡eˆµî#ÄòLË\0;";break;case"cross.gif":echo"GIF89a\0\0\0001îîî\0\0€™™™\0\0\0!ù\0\0\0,\0\0\0\0\0\0#„©Ëí#\naÖFo~yÃ._wa”á1ç±JîGÂL×6]\0\0;";break;case"up.gif":echo"GIF89a\0\0\0001îîî\0\0€™™™\0\0\0!ù\0\0\0,\0\0\0\0\0\0 „©ËíMQN\nï}ôa8ŠyšaÅ¶®\0Çò\0;";break;case"down.gif":echo"GIF89a\0\0\0001îîî\0\0€™™™\0\0\0!ù\0\0\0,\0\0\0\0\0\0 „©ËíMñÌ*)¾[Wş\\¢ÇL&ÙœÆ¶•\0Çò\0;";break;case"arrow.gif":echo"GIF89a\0\n\0€\0\0€€€ÿÿÿ!ù\0\0\0,\0\0\0\0\0\n\0\0‚i–±‹”ªÓ²Ş»\0\0;";break;}}exit;}function
connection(){global$h;return$h;}function
adminer(){global$b;return$b;}function
idf_unescape($v){$bd=substr($v,-1);return
str_replace($bd.$bd,$bd,substr($v,1,-1));}function
escape_string($X){return
substr(q($X),1,-1);}function
remove_slashes($je,$bc=false){if(get_magic_quotes_gpc()){while(list($z,$X)=each($je)){foreach($X
as$Sc=>$W){unset($je[$z][$Sc]);if(is_array($W)){$je[$z][stripslashes($Sc)]=$W;$je[]=&$je[$z][stripslashes($Sc)];}else$je[$z][stripslashes($Sc)]=($bc?$W:stripslashes($W));}}}}function
bracket_escape($v,$Fa=false){static$vf=array(':'=>':1',']'=>':2','['=>':3');return
strtr($v,($Fa?array_flip($vf):$vf));}function
h($Q){return
htmlspecialchars(str_replace("\0","",$Q),ENT_QUOTES);}function
nbsp($Q){return(trim($Q)!=""?h($Q):"&nbsp;");}function
nl_br($Q){return
str_replace("\n","<br>",$Q);}function
checkbox($D,$Y,$Ra,$Yc="",$Id="",$Va=""){$K="<input type='checkbox' name='$D' value='".h($Y)."'".($Ra?" checked":"").($Id?' onclick="'.h($Id).'"':'').">";return($Yc!=""||$Va?"<label".($Va?" class='$Va'":"").">$K".h($Yc)."</label>":$K);}function
optionlist($Nd,$Ie=null,$Nf=false){$K="";foreach($Nd
as$Sc=>$W){$Od=array($Sc=>$W);if(is_array($W)){$K.='<optgroup label="'.h($Sc).'">';$Od=$W;}foreach($Od
as$z=>$X)$K.='<option'.($Nf||is_string($z)?' value="'.h($z).'"':'').(($Nf||is_string($z)?(string)$z:$X)===$Ie?' selected':'').'>'.h($X);if(is_array($W))$K.='</optgroup>';}return$K;}function
html_select($D,$Nd,$Y="",$Hd=true){if($Hd)return"<select name='".h($D)."'".(is_string($Hd)?' onchange="'.h($Hd).'"':"").">".optionlist($Nd,$Y)."</select>";$K="";foreach($Nd
as$z=>$X)$K.="<label><input type='radio' name='".h($D)."' value='".h($z)."'".($z==$Y?" checked":"").">".h($X)."</label>";return$K;}function
select_input($Ba,$Nd,$Y="",$ae=""){return($Nd?"<select$Ba><option value=''>$ae".optionlist($Nd,$Y,true)."</select>":"<input$Ba size='10' value='".h($Y)."' placeholder='$ae'>");}function
confirm(){return" onclick=\"return confirm('".lang(0)."');\"";}function
print_fieldset($u,$dd,$Uf=false,$Id=""){echo"<fieldset><legend><a href='#fieldset-$u' onclick=\"".h($Id)."return !toggle('fieldset-$u');\">$dd</a></legend><div id='fieldset-$u'".($Uf?"":" class='hidden'").">\n";}function
bold($Na,$Va=""){return($Na?" class='active $Va'":($Va?" class='$Va'":""));}function
odd($K=' class="odd"'){static$t=0;if(!$K)$t=-1;return($t++%2?$K:'');}function
js_escape($Q){return
addcslashes($Q,"\r\n'\\/");}function
json_row($z,$X=null){static$cc=true;if($cc)echo"{";if($z!=""){echo($cc?"":",")."\n\t\"".addcslashes($z,"\r\n\"\\/").'": '.($X!==null?'"'.addcslashes($X,"\r\n\"\\/").'"':'undefined');$cc=false;}else{echo"\n}\n";$cc=true;}}function
ini_bool($Jc){$X=ini_get($Jc);return(preg_match('~^(on|true|yes)$~i',$X)||(int)$X);}function
sid(){static$K;if($K===null)$K=(SID&&!($_COOKIE&&ini_bool("session.use_cookies")));return$K;}function
set_password($Qf,$O,$V,$H){$_SESSION["pwds"][$Qf][$O][$V]=($_COOKIE["adminer_key"]&&is_string($H)?array(encrypt_string($H,$_COOKIE["adminer_key"])):$H);}function
get_password(){$K=get_session("pwds");if(is_array($K))$K=($_COOKIE["adminer_key"]?decrypt_string($K[0],$_COOKIE["adminer_key"]):false);return$K;}function
q($Q){global$n;return$n->quote($Q);}function
get_vals($I,$e=0){global$h;$K=array();$J=$h->query($I);if(is_object($J)){while($L=$J->fetch_row())$K[]=$L[$e];}return$K;}function
get_key_vals($I,$i=null,$nf=0){global$h;if(!is_object($i))$i=$h;$K=array();$i->timeout=$nf;$J=$i->query($I);$i->timeout=0;if(is_object($J)){while($L=$J->fetch_row())$K[$L[0]]=$L[1];}return$K;}function
get_rows($I,$i=null,$o="<p class='error'>"){global$h;$eb=(is_object($i)?$i:$h);$K=array();$J=$eb->query($I);if(is_object($J)){while($L=$J->fetch_assoc())$K[]=$L;}elseif(!$J&&!is_object($i)&&$o&&defined("PAGE_HEADER"))echo$o.error()."\n";return$K;}function
unique_array($L,$x){foreach($x
as$w){if(preg_match("~PRIMARY|UNIQUE~",$w["type"])){$K=array();foreach($w["columns"]as$z){if(!isset($L[$z]))continue
2;$K[$z]=$L[$z];}return$K;}}}function
where($Z,$q=array()){global$y;$K=array();$oc='(^[\w\(]+('.str_replace("_",".*",preg_quote(idf_escape("_"))).')?\)+$)';foreach((array)$Z["where"]as$z=>$X){$z=bracket_escape($z,1);$e=(preg_match($oc,$z)?$z:idf_escape($z));$K[]=$e.(($y=="sql"&&preg_match('~^[0-9]*\\.[0-9]*$~',$X))||$y=="mssql"?" LIKE ".q(addcslashes($X,"%_\\")):" = ".unconvert_field($q[$z],q($X)));if($y=="sql"&&preg_match('~char|text~',$q[$z]["type"])&&preg_match("~[^ -@]~",$X))$K[]="$e = ".q($X)." COLLATE utf8_bin";}foreach((array)$Z["null"]as$z)$K[]=(preg_match($oc,$z)?$z:idf_escape($z))." IS NULL";return
implode(" AND ",$K);}function
where_check($X,$q=array()){parse_str($X,$Qa);remove_slashes(array(&$Qa));return
where($Qa,$q);}function
where_link($t,$e,$Y,$Kd="="){return"&where%5B$t%5D%5Bcol%5D=".urlencode($e)."&where%5B$t%5D%5Bop%5D=".urlencode(($Y!==null?$Kd:"IS NULL"))."&where%5B$t%5D%5Bval%5D=".urlencode($Y);}function
convert_fields($f,$q,$N=array()){$K="";foreach($f
as$z=>$X){if($N&&!in_array(idf_escape($z),$N))continue;$ya=convert_field($q[$z]);if($ya)$K.=", $ya AS ".idf_escape($z);}return$K;}function
cookie($D,$Y,$gd=2592000){global$aa;$G=array($D,(preg_match("~\n~",$Y)?"":$Y),($gd?time()+$gd:0),preg_replace('~\\?.*~','',$_SERVER["REQUEST_URI"]),"",$aa);if(version_compare(PHP_VERSION,'5.2.0')>=0)$G[]=true;return
call_user_func_array('setcookie',$G);}function
restart_session(){if(!ini_bool("session.use_cookies"))session_start();}function
stop_session(){if(!ini_bool("session.use_cookies"))session_write_close();}function&get_session($z){return$_SESSION[$z][DRIVER][SERVER][$_GET["username"]];}function
set_session($z,$X){$_SESSION[$z][DRIVER][SERVER][$_GET["username"]]=$X;}function
auth_url($Qf,$O,$V,$m=null){global$yb;preg_match('~([^?]*)\\??(.*)~',remove_from_uri(implode("|",array_keys($yb))."|username|".($m!==null?"db|":"").session_name()),$B);return"$B[1]?".(sid()?SID."&":"").($Qf!="server"||$O!=""?urlencode($Qf)."=".urlencode($O)."&":"")."username=".urlencode($V).($m!=""?"&db=".urlencode($m):"").($B[2]?"&$B[2]":"");}function
is_ajax(){return($_SERVER["HTTP_X_REQUESTED_WITH"]=="XMLHttpRequest");}function
redirect($hd,$rd=null){if($rd!==null){restart_session();$_SESSION["messages"][preg_replace('~^[^?]*~','',($hd!==null?$hd:$_SERVER["REQUEST_URI"]))][]=$rd;}if($hd!==null){if($hd=="")$hd=".";header("Location: $hd");exit;}}function
query_redirect($I,$hd,$rd,$se=true,$Qb=true,$Vb=false,$mf=""){global$h,$o,$b;if($Qb){$Ue=microtime(true);$Vb=!$h->query($I);$mf=format_time($Ue);}$Se="";if($I)$Se=$b->messageQuery($I,$mf);if($Vb){$o=error().$Se;return
false;}if($se)redirect($hd,$rd.$Se);return
true;}function
queries($I){global$h;static$me=array();static$Ue;if(!$Ue)$Ue=microtime(true);if($I===null)return
array(implode("\n",$me),format_time($Ue));$me[]=(preg_match('~;$~',$I)?"DELIMITER ;;\n$I;\nDELIMITER ":$I).";";return$h->query($I);}function
apply_queries($I,$T,$Nb='table'){foreach($T
as$R){if(!queries("$I ".$Nb($R)))return
false;}return
true;}function
queries_redirect($hd,$rd,$se){list($me,$mf)=queries(null);return
query_redirect($me,$hd,$rd,$se,false,!$se,$mf);}function
format_time($Ue){return
lang(1,max(0,microtime(true)-$Ue));}function
remove_from_uri($Ud=""){return
substr(preg_replace("~(?<=[?&])($Ud".(SID?"":"|".session_name()).")=[^&]*&~",'',"$_SERVER[REQUEST_URI]&"),0,-1);}function
pagination($F,$lb){return" ".($F==$lb?$F+1:'<a href="'.h(remove_from_uri("page").($F?"&page=$F".($_GET["next"]?"&next=".urlencode($_GET["next"]):""):"")).'">'.($F+1)."</a>");}function
get_file($z,$ob=false){$Yb=$_FILES[$z];if(!$Yb)return
null;foreach($Yb
as$z=>$X)$Yb[$z]=(array)$X;$K='';foreach($Yb["error"]as$z=>$o){if($o)return$o;$D=$Yb["name"][$z];$tf=$Yb["tmp_name"][$z];$gb=file_get_contents($ob&&preg_match('~\\.gz$~',$D)?"compress.zlib://$tf":$tf);if($ob){$Ue=substr($gb,0,3);if(function_exists("iconv")&&preg_match("~^\xFE\xFF|^\xFF\xFE~",$Ue,$te))$gb=iconv("utf-16","utf-8",$gb);elseif($Ue=="\xEF\xBB\xBF")$gb=substr($gb,3);$K.=$gb."\n\n";}else$K.=$gb;}return$K;}function
upload_error($o){$od=($o==UPLOAD_ERR_INI_SIZE?ini_get("upload_max_filesize"):0);return($o?lang(2).($od?" ".lang(3,$od):""):lang(4));}function
repeat_pattern($Yd,$ed){return
str_repeat("$Yd{0,65535}",$ed/65535)."$Yd{0,".($ed%65535)."}";}function
is_utf8($X){return(preg_match('~~u',$X)&&!preg_match('~[\\0-\\x8\\xB\\xC\\xE-\\x1F]~',$X));}function
shorten_utf8($Q,$ed=80,$af=""){if(!preg_match("(^(".repeat_pattern("[\t\r\n -\x{FFFF}]",$ed).")($)?)u",$Q,$B))preg_match("(^(".repeat_pattern("[\t\r\n -~]",$ed).")($)?)",$Q,$B);return
h($B[1]).$af.(isset($B[2])?"":"<i>...</i>");}function
format_number($X){return
strtr(number_format($X,0,".",lang(5)),preg_split('~~u',lang(6),-1,PREG_SPLIT_NO_EMPTY));}function
friendly_url($X){return
preg_replace('~[^a-z0-9_]~i','-',$X);}function
hidden_fields($je,$Dc=array()){while(list($z,$X)=each($je)){if(!in_array($z,$Dc)){if(is_array($X)){foreach($X
as$Sc=>$W)$je[$z."[$Sc]"]=$W;}else
echo'<input type="hidden" name="'.h($z).'" value="'.h($X).'">';}}}function
hidden_fields_get(){echo(sid()?'<input type="hidden" name="'.session_name().'" value="'.h(session_id()).'">':''),(SERVER!==null?'<input type="hidden" name="'.DRIVER.'" value="'.h(SERVER).'">':""),'<input type="hidden" name="username" value="'.h($_GET["username"]).'">';}function
table_status1($R,$Wb=false){$K=table_status($R,$Wb);return($K?$K:array("Name"=>$R));}function
column_foreign_keys($R){global$b;$K=array();foreach($b->foreignKeys($R)as$hc){foreach($hc["source"]as$X)$K[$X][]=$hc;}return$K;}function
enum_input($U,$Ba,$p,$Y,$Ib=null){global$b;preg_match_all("~'((?:[^']|'')*)'~",$p["length"],$C);$K=($Ib!==null?"<label><input type='$U'$Ba value='$Ib'".((is_array($Y)?in_array($Ib,$Y):$Y===0)?" checked":"")."><i>".lang(7)."</i></label>":"");foreach($C[1]as$t=>$X){$X=stripcslashes(str_replace("''","'",$X));$Ra=(is_int($Y)?$Y==$t+1:(is_array($Y)?in_array($t+1,$Y):$Y===$X));$K.=" <label><input type='$U'$Ba value='".($t+1)."'".($Ra?' checked':'').'>'.h($b->editVal($X,$p)).'</label>';}return$K;}function
input($p,$Y,$r){global$h,$Cf,$b,$y;$D=h(bracket_escape($p["field"]));echo"<td class='function'>";if(is_array($Y)&&!$r){$wa=array($Y);if(version_compare(PHP_VERSION,5.4)>=0)$wa[]=JSON_PRETTY_PRINT;$Y=call_user_func_array('json_encode',$wa);$r="json";}$xe=($y=="mssql"&&$p["auto_increment"]);if($xe&&!$_POST["save"])$r=null;$pc=(isset($_GET["select"])||$xe?array("orig"=>lang(8)):array())+$b->editFunctions($p);$Ba=" name='fields[$D]'";if($p["type"]=="enum")echo
nbsp($pc[""])."<td>".$b->editInput($_GET["edit"],$p,$Ba,$Y);else{$cc=0;foreach($pc
as$z=>$X){if($z===""||!$X)break;$cc++;}$Hd=($cc?" onchange=\"var f = this.form['function[".h(js_escape(bracket_escape($p["field"])))."]']; if ($cc > f.selectedIndex) f.selectedIndex = $cc;\" onkeyup='keyupChange.call(this);'":"");$Ba.=$Hd;$uc=(in_array($r,$pc)||isset($pc[$r]));echo(count($pc)>1?"<select name='function[$D]' onchange='functionChange(this);'".on_help("getTarget(event).value.replace(/^SQL\$/, '')",1).">".optionlist($pc,$r===null||$uc?$r:"")."</select>":nbsp(reset($pc))).'<td>';$Lc=$b->editInput($_GET["edit"],$p,$Ba,$Y);if($Lc!="")echo$Lc;elseif($p["type"]=="set"){preg_match_all("~'((?:[^']|'')*)'~",$p["length"],$C);foreach($C[1]as$t=>$X){$X=stripcslashes(str_replace("''","'",$X));$Ra=(is_int($Y)?($Y>>$t)&1:in_array($X,explode(",",$Y),true));echo" <label><input type='checkbox' name='fields[$D][$t]' value='".(1<<$t)."'".($Ra?' checked':'')."$Hd>".h($b->editVal($X,$p)).'</label>';}}elseif(preg_match('~blob|bytea|raw|file~',$p["type"])&&ini_bool("file_uploads"))echo"<input type='file' name='fields-$D'$Hd>";elseif(($jf=preg_match('~text|lob~',$p["type"]))||preg_match("~\n~",$Y)){if($jf&&$y!="sqlite")$Ba.=" cols='50' rows='12'";else{$M=min(12,substr_count($Y,"\n")+1);$Ba.=" cols='30' rows='$M'".($M==1?" style='height: 1.2em;'":"");}echo"<textarea$Ba>".h($Y).'</textarea>';}elseif($r=="json")echo"<textarea$Ba cols='50' rows='12' class='jush-js'>".h($Y).'</textarea>';else{$qd=(!preg_match('~int~',$p["type"])&&preg_match('~^(\\d+)(,(\\d+))?$~',$p["length"],$B)?((preg_match("~binary~",$p["type"])?2:1)*$B[1]+($B[3]?1:0)+($B[2]&&!$p["unsigned"]?1:0)):($Cf[$p["type"]]?$Cf[$p["type"]]+($p["unsigned"]?0:1):0));if($y=='sql'&&$h->server_info>=5.6&&preg_match('~time~',$p["type"]))$qd+=7;echo"<input".((!$uc||$r==="")&&preg_match('~(?<!o)int~',$p["type"])?" type='number'":"")." value='".h($Y)."'".($qd?" maxlength='$qd'":"").(preg_match('~char|binary~',$p["type"])&&$qd>20?" size='40'":"")."$Ba>";}}}function
process_input($p){global$b;$v=bracket_escape($p["field"]);$r=$_POST["function"][$v];$Y=$_POST["fields"][$v];if($p["type"]=="enum"){if($Y==-1)return
false;if($Y=="")return"NULL";return+$Y;}if($p["auto_increment"]&&$Y=="")return
null;if($r=="orig")return($p["on_update"]=="CURRENT_TIMESTAMP"?idf_escape($p["field"]):false);if($r=="NULL")$Y=null;if($p["type"]=="set")return
array_sum((array)$Y);if($r=="json"){$r="";$Y=json_decode($Y,true);if(!is_array($Y))return
false;return$Y;}if(preg_match('~blob|bytea|raw|file~',$p["type"])&&ini_bool("file_uploads")){$Yb=get_file("fields-$v");if(!is_string($Yb))return
false;return
q($Yb);}return$b->processInput($p,$Y,$r);}function
fields_from_edit(){global$n;$K=array();foreach((array)$_POST["field_keys"]as$z=>$X){if($X!=""){$X=bracket_escape($X);$_POST["function"][$X]=$_POST["field_funs"][$z];$_POST["fields"][$X]=$_POST["field_vals"][$z];}}foreach((array)$_POST["fields"]as$z=>$X){$D=bracket_escape($z,1);$K[$D]=array("field"=>$D,"privileges"=>array("insert"=>1,"update"=>1),"null"=>1,"auto_increment"=>($z==$n->primary),);}return$K;}function
search_tables(){global$b,$h;$_GET["where"][0]["op"]="LIKE %%";$_GET["where"][0]["val"]=$_POST["query"];$kc=false;foreach(table_status('',true)as$R=>$S){$D=$b->tableName($S);if(isset($S["Engine"])&&$D!=""&&(!$_POST["tables"]||in_array($R,$_POST["tables"]))){$J=$h->query("SELECT".limit("1 FROM ".table($R)," WHERE ".implode(" AND ",$b->selectSearchProcess(fields($R),array())),1));if(!$J||$J->fetch_row()){if(!$kc){echo"<ul>\n";$kc=true;}echo"<li>".($J?"<a href='".h(ME."select=".urlencode($R)."&where[0][op]=".urlencode($_GET["where"][0]["op"])."&where[0][val]=".urlencode($_GET["where"][0]["val"]))."'>$D</a>\n":"$D: <span class='error'>".error()."</span>\n");}}}echo($kc?"</ul>":"<p class='message'>".lang(9))."\n";}function
dump_headers($Bc,$wd=false){global$b;$K=$b->dumpHeaders($Bc,$wd);$Sd=$_POST["output"];if($Sd!="text")header("Content-Disposition: attachment; filename=".$b->dumpFilename($Bc).".$K".($Sd!="file"&&!preg_match('~[^0-9a-z]~',$Sd)?".$Sd":""));session_write_close();ob_flush();flush();return$K;}function
dump_csv($L){foreach($L
as$z=>$X){if(preg_match("~[\"\n,;\t]~",$X)||$X==="")$L[$z]='"'.str_replace('"','""',$X).'"';}echo
implode(($_POST["format"]=="csv"?",":($_POST["format"]=="tsv"?"\t":";")),$L)."\r\n";}function
apply_sql_function($r,$e){return($r?($r=="unixepoch"?"DATETIME($e, '$r')":($r=="count distinct"?"COUNT(DISTINCT ":strtoupper("$r("))."$e)"):$e);}function
get_temp_dir(){$K=ini_get("upload_tmp_dir");if(!$K){if(function_exists('sys_get_temp_dir'))$K=sys_get_temp_dir();else{$Zb=@tempnam("","");if(!$Zb)return
false;$K=dirname($Zb);unlink($Zb);}}return$K;}function
password_file($jb){$Zb=get_temp_dir()."/adminer.key";$K=@file_get_contents($Zb);if($K||!$jb)return$K;$mc=@fopen($Zb,"w");if($mc){$K=rand_string();fwrite($mc,$K);fclose($mc);}return$K;}function
rand_string(){return
md5(uniqid(mt_rand(),true));}function
select_value($X,$A,$p,$kf){global$b,$aa;if(is_array($X)){$K="";foreach($X
as$Sc=>$W)$K.="<tr>".($X!=array_values($X)?"<th>".h($Sc):"")."<td>".select_value($W,$A,$p,$kf);return"<table cellspacing='0'>$K</table>";}if(!$A)$A=$b->selectLink($X,$p);if($A===null){if(is_mail($X))$A="mailto:$X";if($ke=is_url($X))$A=(($ke=="http"&&$aa)||preg_match('~WebKit~i',$_SERVER["HTTP_USER_AGENT"])?$X:"$ke://www.adminer.org/redirect/?url=".urlencode($X));}$K=$b->editVal($X,$p);if($K!==null){if($K==="")$K="&nbsp;";elseif($kf!=""&&is_shortable($p)&&is_utf8($K))$K=shorten_utf8($K,max(0,+$kf));else$K=h($K);}return$b->selectVal($K,$A,$p,$X);}function
is_mail($Fb){$za='[-a-z0-9!#$%&\'*+/=?^_`{|}~]';$xb='[a-z0-9]([-a-z0-9]{0,61}[a-z0-9])';$Yd="$za+(\\.$za+)*@($xb?\\.)+$xb";return
is_string($Fb)&&preg_match("(^$Yd(,\\s*$Yd)*\$)i",$Fb);}function
is_url($Q){$xb='[a-z0-9]([-a-z0-9]{0,61}[a-z0-9])';return(preg_match("~^(https?)://($xb?\\.)+$xb(:\\d+)?(/.*)?(\\?.*)?(#.*)?\$~i",$Q,$B)?strtolower($B[1]):"");}function
is_shortable($p){return
preg_match('~char|text|lob|geometry|point|linestring|polygon|string~',$p["type"]);}function
count_rows($R,$Z,$Qc,$s){global$y;$I=" FROM ".table($R).($Z?" WHERE ".implode(" AND ",$Z):"");return($Qc&&($y=="sql"||count($s)==1)?"SELECT COUNT(DISTINCT ".implode(", ",$s).")$I":"SELECT COUNT(*)".($Qc?" FROM (SELECT 1$I$qc) x":$I));}function
slow_query($I){global$b,$uf;$m=$b->database();$nf=$b->queryTimeout();if(support("kill")&&is_object($i=connect())&&($m==""||$i->select_db($m))){$Xc=$i->result("SELECT CONNECTION_ID()");echo'<script type="text/javascript">
var timeout = setTimeout(function () {
	ajax(\'',js_escape(ME),'script=kill\', function () {
	}, \'token=',$uf,'&kill=',$Xc,'\');
}, ',1000*$nf,');
</script>
';}else$i=null;ob_flush();flush();$K=@get_key_vals($I,$i,$nf);if($i){echo"<script type='text/javascript'>clearTimeout(timeout);</script>\n";ob_flush();flush();}return
array_keys($K);}function
get_token(){$pe=rand(1,1e6);return($pe^$_SESSION["token"]).":$pe";}function
verify_token(){list($uf,$pe)=explode(":",$_POST["token"]);return($pe^$_SESSION["token"])==$uf;}function
lzw_decompress($Ka){$vb=256;$La=8;$Xa=array();$ze=0;$_e=0;for($t=0;$t<strlen($Ka);$t++){$ze=($ze<<8)+ord($Ka[$t]);$_e+=8;if($_e>=$La){$_e-=$La;$Xa[]=$ze>>$_e;$ze&=(1<<$_e)-1;$vb++;if($vb>>$La)$La++;}}$ub=range("\0","\xFF");$K="";foreach($Xa
as$t=>$Wa){$Eb=$ub[$Wa];if(!isset($Eb))$Eb=$Yf.$Yf[0];$K.=$Eb;if($t)$ub[]=$Yf.$Eb[0];$Yf=$Eb;}return$K;}function
on_help($bb,$Pe=0){return" onmouseover='helpMouseover(this, event, ".h($bb).", $Pe);' onmouseout='helpMouseout(this, event);'";}function
edit_form($a,$q,$L,$Kf){global$b,$y,$uf,$o;$ef=$b->tableName(table_status1($a,true));page_header(($Kf?lang(10):lang(11)),$o,array("select"=>array($a,$ef)),$ef);if($L===false)echo"<p class='error'>".lang(12)."\n";echo'<div id="message"></div>
<form action="" method="post" enctype="multipart/form-data" id="form">
';if(!$q)echo"<p class='error'>".lang(13)."\n";else{echo"<table cellspacing='0' onkeydown='return editingKeydown(event);'>\n";foreach($q
as$D=>$p){echo"<tr><th>".$b->fieldName($p);$pb=$_GET["set"][bracket_escape($D)];if($pb===null){$pb=$p["default"];if($p["type"]=="bit"&&preg_match("~^b'([01]*)'\$~",$pb,$te))$pb=$te[1];}$Y=($L!==null?($L[$D]!=""&&$y=="sql"&&preg_match("~enum|set~",$p["type"])?(is_array($L[$D])?array_sum($L[$D]):+$L[$D]):$L[$D]):(!$Kf&&$p["auto_increment"]?"":(isset($_GET["select"])?false:$pb)));if(!$_POST["save"]&&is_string($Y))$Y=$b->editVal($Y,$p);$r=($_POST["save"]?(string)$_POST["function"][$D]:($Kf&&$p["on_update"]=="CURRENT_TIMESTAMP"?"now":($Y===false?null:($Y!==null?'':'NULL'))));if(preg_match("~time~",$p["type"])&&$Y=="CURRENT_TIMESTAMP"){$Y="";$r="now";}input($p,$Y,$r);echo"\n";}if(!support("table"))echo"<tr>"."<th><input name='field_keys[]' onkeyup='keyupChange.call(this);' onchange='fieldChange(this);' value=''>"."<td class='function'>".html_select("field_funs[]",$b->editFunctions(array("null"=>isset($_GET["select"]))))."<td><input name='field_vals[]'>"."\n";echo"</table>\n";}echo"<p>\n";if($q){echo"<input type='submit' value='".lang(14)."'>\n";if(!isset($_GET["select"]))echo"<input type='submit' name='insert' value='".($Kf?lang(15)."' onclick='return !ajaxForm(this.form, \"".lang(16).'...", this)':lang(17))."' title='Ctrl+Shift+Enter'>\n";}echo($Kf?"<input type='submit' name='delete' value='".lang(18)."'".confirm().">\n":($_POST||!$q?"":"<script type='text/javascript'>focus(document.getElementById('form').getElementsByTagName('td')[1].firstChild);</script>\n"));if(isset($_GET["select"]))hidden_fields(array("check"=>(array)$_POST["check"],"clone"=>$_POST["clone"],"all"=>$_POST["all"]));echo'<input type="hidden" name="referer" value="',h(isset($_POST["referer"])?$_POST["referer"]:$_SERVER["HTTP_REFERER"]),'">
<input type="hidden" name="save" value="1">
<input type="hidden" name="token" value="',$uf,'">
</form>
';}global$b,$h,$yb,$Cb,$Kb,$o,$pc,$rc,$aa,$Kc,$y,$ba,$ad,$Gd,$Zd,$Xe,$vc,$uf,$xf,$Cf,$Jf,$ca;if(!$_SERVER["REQUEST_URI"])$_SERVER["REQUEST_URI"]=$_SERVER["ORIG_PATH_INFO"];if(!strpos($_SERVER["REQUEST_URI"],'?')&&$_SERVER["QUERY_STRING"]!="")$_SERVER["REQUEST_URI"].="?$_SERVER[QUERY_STRING]";$aa=$_SERVER["HTTPS"]&&strcasecmp($_SERVER["HTTPS"],"off");@ini_set("session.use_trans_sid",false);session_cache_limiter("");if(!defined("SID")){session_name("adminer_sid");$G=array(0,preg_replace('~\\?.*~','',$_SERVER["REQUEST_URI"]),"",$aa);if(version_compare(PHP_VERSION,'5.2.0')>=0)$G[]=true;call_user_func_array('session_set_cookie_params',$G);session_start();}remove_slashes(array(&$_GET,&$_POST,&$_COOKIE),$bc);if(get_magic_quotes_runtime())set_magic_quotes_runtime(false);@set_time_limit(0);@ini_set("zend.ze1_compatibility_mode",false);@ini_set("precision",20);$ad=array('en'=>'English','ar'=>'Ø§Ù„Ø¹Ø±Ø¨ÙŠØ©','bn'=>'à¦¬à¦¾à¦‚à¦²à¦¾','ca'=>'CatalÃ ','cs'=>'ÄŒeÅ¡tina','de'=>'Deutsch','es'=>'EspaÃ±ol','et'=>'Eesti','fa'=>'ÙØ§Ø±Ø³ÛŒ','fr'=>'FranÃ§ais','hu'=>'Magyar','id'=>'Bahasa Indonesia','it'=>'Italiano','ja'=>'æ—¥æœ¬èª','ko'=>'í•œêµ­ì–´','lt'=>'LietuviÅ³','nl'=>'Nederlands','no'=>'Norsk','pl'=>'Polski','pt'=>'PortuguÃªs','pt-br'=>'PortuguÃªs (Brazil)','ro'=>'Limba RomÃ¢nÄƒ','ru'=>'Ğ ÑƒÑÑĞºĞ¸Ğ¹ ÑĞ·Ñ‹Ğº','sk'=>'SlovenÄina','sl'=>'Slovenski','sr'=>'Ğ¡Ñ€Ğ¿ÑĞºĞ¸','ta'=>'à®¤â€Œà®®à®¿à®´à¯','th'=>'à¸ à¸²à¸©à¸²à¹„à¸—à¸¢','tr'=>'TÃ¼rkÃ§e','uk'=>'Ğ£ĞºÑ€Ğ°Ñ—Ğ½ÑÑŒĞºĞ°','vi'=>'Tiáº¿ng Viá»‡t','zh'=>'ç®€ä½“ä¸­æ–‡','zh-tw'=>'ç¹é«”ä¸­æ–‡',);function
get_lang(){global$ba;return$ba;}function
lang($v,$Cd=null){if(is_string($v)){$ce=array_search($v,get_translations("en"));if($ce!==false)$v=$ce;}global$ba,$xf;$wf=($xf[$v]?$xf[$v]:$v);if(is_array($wf)){$ce=($Cd==1?0:($ba=='cs'||$ba=='sk'?($Cd&&$Cd<5?1:2):($ba=='fr'?(!$Cd?0:1):($ba=='pl'?($Cd%10>1&&$Cd%10<5&&$Cd/10%10!=1?1:2):($ba=='sl'?($Cd%100==1?0:($Cd%100==2?1:($Cd%100==3||$Cd%100==4?2:3))):($ba=='lt'?($Cd%10==1&&$Cd%100!=11?0:($Cd%10>1&&$Cd/10%10!=1?1:2)):($ba=='ru'||$ba=='sr'||$ba=='uk'?($Cd%10==1&&$Cd%100!=11?0:($Cd%10>1&&$Cd%10<5&&$Cd/10%10!=1?1:2)):1)))))));$wf=$wf[$ce];}$wa=func_get_args();array_shift($wa);$jc=str_replace("%d","%s",$wf);if($jc!=$wf)$wa[0]=format_number($Cd);return
vsprintf($jc,$wa);}function
switch_lang(){global$ba,$ad;echo"<form action='' method='post'>\n<div id='lang'>",lang(19).": ".html_select("lang",$ad,$ba,"this.form.submit();")," <input type='submit' value='".lang(20)."' class='hidden'>\n","<input type='hidden' name='token' value='".get_token()."'>\n";echo"</div>\n</form>\n";}if(isset($_POST["lang"])&&verify_token()){cookie("adminer_lang",$_POST["lang"]);$_SESSION["lang"]=$_POST["lang"];$_SESSION["translations"]=array();redirect(remove_from_uri());}$ba="en";if(isset($ad[$_COOKIE["adminer_lang"]])){cookie("adminer_lang",$_COOKIE["adminer_lang"]);$ba=$_COOKIE["adminer_lang"];}elseif(isset($ad[$_SESSION["lang"]]))$ba=$_SESSION["lang"];else{$pa=array();preg_match_all('~([-a-z]+)(;q=([0-9.]+))?~',str_replace("_","-",strtolower($_SERVER["HTTP_ACCEPT_LANGUAGE"])),$C,PREG_SET_ORDER);foreach($C
as$B)$pa[$B[1]]=(isset($B[3])?$B[3]:1);arsort($pa);foreach($pa
as$z=>$le){if(isset($ad[$z])){$ba=$z;break;}$z=preg_replace('~-.*~','',$z);if(!isset($pa[$z])&&isset($ad[$z])){$ba=$z;break;}}}$xf=&$_SESSION["translations"];if($_SESSION["translations_version"]!=2282657289){$xf=array();$_SESSION["translations_version"]=2282657289;}function
get_translations($Zc){switch($Zc){case"en":$g="A9D“yÔ@s:ÀGà¡(¸ffƒ‚Š¦ã	ˆÙ:ÄS°Şa2\"1¦..L'ƒI´êm‘#Çs,†KƒšOP#IÌ@%9¥i4Èo2ÏÆó €Ë,9%ÀPÀb2£a¸àr\n2›NCÈ(Şr4™Í1C`(:Ebç9AÈi:‰&ã™”åy·ˆFó½ĞY‚ˆ\r´\n– 8ZÔS=\$Aœ†¤`Ñ=ËÜŒ²‚0Ê\nÒãdFé	ŒŞn:ZÎ°)­ãQŒµ™öú£°Ak¾ßÄê}äˆe‹çADÍéœêaÊÄ¯ ¢„\\Ã}ö5ğ#|@èhÚ3·ÃN¾}@¡ÑiÕ¦«ÁËN›t¼Å~9‚ˆ™ÈöBØ­8¦:-pÎüˆKXÂ9,¢pÊ:ë8Öã(ß\0À‹(˜½ Rì¼,î’üŠ@.£®9Â#ÈåëPÜê/Ãkz2¶=-Ã(îß³£jŒCË:„²„ú/¢–ˆZrxjÔ°XÆ4Mèò;¼P³¯0ØÚÛ#b×Êˆ¼Í±’LÌ|)£Ô2Íbè¸Êğ`üŠq¤W\"©ÓhÂ“1N¸@ûÆˆ<h©H‰ËC\$ÉóÕQƒuØ%\nXî	@t&‰¡Ğ¦)BØóU\"ìÚ6…£\$W@ÍJk6¸Cd	*Lhåè*ò*\rèÔd7(Úø:Œc’9ŒÃ¨ÙE®\0XËÁ‰ÏCÓKZ~ÌcpêÎ…ÀM‰cKVRfÙö§ÚÖÅ’è[ı5B\\7’”/c°Â6\r)†)ŠB3.7q \\P-ó¾Ë:az-i@™ØH=™gv…¤ÒYï-4„„À%ÊÚ\"ˆ²kc¹Ö8\r(Ék£²«±xSX Ü”%JŠüÈDñM\$<f™¶\$cB3¡Ñ=Ğ^úÈ\\\\+ğ\\³Œá|i±<Q ç‘áB92£¦¢/¢ÍèÖÂJÄ‹ÏÃ xŒ!ò~ŸC@ŞÿİLxÈF18·#N.Í‘q @î²ï5’Ì	¨@(	ƒÖñìï0@(JD€¤WòLÑ_ƒuı€5¹µ4ßì2T–%É…Ä6¾ã—&ˆ_éŸ4’¹\"|§ÙÉ®_ÍºÎÂÖ1 .ºôW=´óbx¦*¸Ã…ŠI­˜Ï(ÌâF³ŞŞ†uòoá\\7\$®päÎfKº3\r,jPÄ ÃzfHñ \$O\\3°À¢	!ê2dŒ#G<ùbdåà’'%¯ZñzGª\$Ÿ)—ºr{/ƒE†2µG¼\"	(ô BX<pñ„¡BˆHbàèeQ¡„3dñ—,5GªXÓBf{aü\"h6°ÆÀkrlô:ófÁÙCƒ\r!™d—ƒÒNIM>ëØP¨h8)Á¸×t\r\r		ƒGpâ#AL_Ùz‘0F\")ˆt·`”x†dI–“ƒ0_U«•#ˆ”Å¨¸ƒ!IYÆ°Ü€§Â¡æ,Ü¼ói'±kŠF`6Èå’wÍV4h˜èÉ‚¢‹	•bğ\nRº‡¼ãØwQÈü¥ÀŞN	WI¦\$¢°†G\"i	€½Hò R°h{¯š2\\~B¤Œ\nQò\\f¶Jzx_D„'„¸‚Hfñ~\r&Zp†9Æ'(.";break;case"ar":$g="ÙC¶P‚Â²†l*„\r”,&\nÙA¶í„ø(J.™„0T2]6QM…ŒO!bù#eØ\\É¥¤\$¸\\\nl+[\nÈdÊk4—O¡è&ÂÕ²‰…ÀQ)Ì…7lIçò„‚E\$…Ê‘¶Ím_7GT\r•eDÙƒ)*VÊ™³'T6U1ÙzHØ]N*PZ,¡BT`Šªìî%VDª5ØAU0‰H S‹d!iQl(p(N¯…Â1÷e4înY7Dƒ	ØÊ 7Ä‘¤ìi6LæS˜€é²:œ†¦¼èh4ïN†æ ­—6IÏEq¥ánÔh/\\äQY2´Òn3Î'’ş½v	•leîÊı†¬ç7©Ftl.nòl?O<B?û¢[%ß!ÅÌ§Ez¡-ˆk‰®Ğâ)ƒš ©@ê\n<­§Šònƒ°©Œü¡Ås\"B§!ïã¾Ì*¹\\ì'ÌbˆU'šÌHĞA°U ìÂÜ‘À,ºâˆ®hš‰¿R©íti§+¹c@p*a£¤g\0H(lz­Ìhsô<nêö‰•Ìd”ÇÎl“»<OH\$=/'’Z«4,‘Ç!(È‚ZG\"-àØA j„8§ŠtU®‰dE+(ƒC'ybÎ¤eBq\nÖil¨êFL\"F»N+İ#ÑÄ‡MñbşU‘{+eÌš®¨J²–&ÊˆTª*îı*Ujzl[U}¸)”}¶ï@³Õ‚@	¢ht)Š`PÔ5ãhÚ‹c\rü0‹´*î[(Kw&®Ò ä:\r‘Ñ±C¨e[N—%ÑMéØ*\ríÚ0ÃÈ@:Ã˜ê1Œmàæ3£`@6\rã;Î9…ğå‘#8Âó„å\r¯8êâ…˜R›ˆb˜¤#àÖ2È& lòè]TÈZ_&°røğ´Î©Cƒ†×—Kğ˜(RK†Û*üˆ0nŒ%:´.–Ş¡'Œ\r¸„Û2kCÚWFû&Á¬kFÆ¹ºkì<ä®oE\0D1 Pš0n(äÙóƒ˜î7TxÊ<Hä2Œš¸x0µ}XÌ„C@è:Ğ^ıè\\0ŒšÜ2AwH3…ú‡’<8¹(Ò7ÁxDß#“v:v‚û›\ra|\$£ƒr6ê xŒ!ôC ®8ßG·ú\0Ã§ç££gâcşÜ:p0Ó‡J±#\$¨œ®ã(€ĞÙ˜CÄ(8€à›LRs\rÂ\0•ˆŠLSq:\"ÑråLäØªvHî]Ì’‚ˆØLy‰\$ålY8RöØ‘{ Å£ƒúuRÛ˜\\«ªòxRB=%äÅd\"VCP‘5‚f`…\0Â¡\",»Š“ÿáâ[ª@Î¥²jHÅ©'Dò-¦’cC… Çf-EÁdUĞêlZÆJ\nÖµÓÊ».ì\$Ÿ\0 §5 €1²Føƒ{ÀÀ1Î˜Q	€€3ƒ^mİ€F\nBE†å_¤~Á¥û`äÃix†¹â­èÊN…A]\n¢’C·ÏâbĞ½&¨c-ã*Ú\"j¼»\nÂ…-%ñP†\r†^ƒ¶¢Q\$H2&+%b–£š@tA°†0ØCkBE‚\0ìC`u8Ìy÷†ÌÈ¥!7ÒY W:¯gT*`ZPs´ôL£3:6?MT’¦\naUyš¥)rÄrXH`m#É©¬¶%s&‚G3ééÍNÙŞ·¦pØñ}¹NQKl	øê&d\$M\nÄ\nD[‚\0D„eĞ„zi\\¨¸:á%ˆ‡H)lñ· Q‰y:@0É‡ÃÔ\0‚d‰‡œôÕ™]!¯8g,‹.jÕ	!4E\\ÄÍR\"IÉ¥W\na”Ü†3Š+RÌMD(ºÒØ¨|J…0Š¸îª3ÿ¤Š*ÅÕJ_ê*~H)¨B\0";break;case"bn":$g="àS)\nt]\0_ˆ 	XD)L¨„@Ğ4l5€ÁBQpÌÌ 9‚ \n¸ú\0‡€,¡ÈhªSEÀ0èb™a%‡. ÑH¶\0¬‡.bÓÅ2n‡‡DÒe*’D¦M¨ŠÉ,OJÃ°„v§˜©”Ñ…\$:IK“Êg5U4¡Lœ	Nd!u>Ï&¶ËÔöå„Òa\\­@'Jx¬ÉS¤Ñí4ĞP²D§±©êêzê¦.SÉõE<ùOS«éékbÊOÌafêhb\0§Bïğør¦ª)—öªå²QŒÁWğ²ëE‹{K§ÔPP~Í9\\§ël*‹_W	ãŞ7ôâÉ¼ê 4NÆQ¸Ş 8'cI°Êg2œÄO9Ôàd0<‡CA§ä:#Üº¸%3–©5Š!n€nJµmk”Åü©,qŸÁî«@á­‹œ(n+Lİ9ˆx£¡ÎkŠIB›Ä4Ã< ŒÀ šâ5mÊnÂ6\0êÀîjÀ€9èzĞ ª,X‘¶í2À§§Î,(_)ìã7*¬è¶n¢\rÁ%3l¥ÃM”ˆ¨ \r²öã¢m¢ä‡KÑKp€LKÂúÙC	‹€S.ëIL•G3ÔW9ÊS·2bÙ!¯«|–Æğ;I7ÅÒäŠë#´Û=ÀĞõMó“TŒRí/Ô\rÒ®­ÓY'ERj!*§¹ôâØƒÅ5eO¯;w4ÓÓM¥±\n§Ò•AFOõ‚ğW5b£[”ó\\ü¢*|NKĞÅEPÂ”ª­»#!×ËYÈªóiX0]×R0l*‚#c\$ñW“àHK^Ôã´9r/ˆóA l¦(´mœ¢N)òR‘7:k\\ßt¸µ¤n¼I«ÂºEÕväMÕ]ƒEy…acÈl+r¼\"òqÄ@yúÂC…ªúÜ·J}ÓF5¤=]z dı3ŞP•>_Û.)@¶F·4:Ô %åc1úÙ­ä©‚ƒ\\QŠ5R`X\"óe¶ú@A²Û4£´mZÒÙ•íå6hÛîNÚŸ44’p\$Bhš\nb˜:Ãh\\-\\èÔ.©èM¥ËìMƒœà±,Í4Èy`Ø:Y=7Ë3õÅ² 	aMHÍ@P¨7¼ãhÂ7!\0ê7c¨Æ1¾#˜Ì:\0Ø7Œñ æ>c—Š0Œãh{úğÛ¯ĞP9…0!L­Ïe9«¦)Ô´—Ñˆ‚š³vl)\\JİI6p%á¶…n ×p¦wNğOªdŞq\né…ue	u· ÌnN®¬¨¬PèÑâÊjÈ!c³D.jÅô\0T„M_ ˜0mÓ«*6ëU°«ƒŠ)ˆt,-ÂİÂ¸x,^ŞÃ¹€+V–çVMRQE8&†æ~ƒ‘è‰ÁÌ;†ğä¿ƒ(x¤9PÈ\0<'‚.†`zƒ@tÀğ^ã€.!‘ñ†àÊtVà¼2†èøÓÈ\r!¾?#æC‘ğ‘œ/ '†Á>	!´8àÛC <á„å%Ïào_ÇĞ< ÖyHt=İáG`Üæ#÷ui¢•åˆ“ƒtÇjX² ‚¦C ²*9jÁßÌ¹6€ ¹6•š‹ÚŠ\$pËª“lE1oğ\r­Å¼ÿIàPo°®¥@XQÇ,©Q`¥c\nLÓ:9:°}•b°’›KóIö:%Í[ÿP\nP‡6bÜâgë}fõy6fd˜ŒÂ*d.O/ó\\@‰…*æê8•BXÊò(ĞP¢ @xS\n„:’œY¾şç\r.šG)˜(±ÍI°£¨d€>ÆHÎèª€)Ec®E§¡	JgÈÁª,kÎ2o£gaÖ\0wNøcxoJ†øæ#b\r!œ0¢\0f=§öF0Œ&Ã_Á¦JEiU*kHr\rá´GsÇzÇ^É¬Ü¯•â HrP %ş(ÄO\nSäÑ‡î)zX)¢¾\n\"û±SJJ£&­UM–F\nĞx/6\rÍ–^öÌÑæ@ØTøšoİ&ÄuhÅ4–ö.Ó¯Õ-G,­6²ö±7Ù¦Ô›Í[µ¸\$·Ú[x^ÀPCv°†0ØCk°\0ìC`u?oQÌñeIuÕ®R‡X¨\rÀ€*…@ŒAÀ ¡ò£Rê×˜=ÀYK~7È;läÎnë\0Ì?hbDÒ·N\"Ó·[U\n!8¯°¬Øk÷ÁôvÜa;'H&Anµ&ñ›ÎHÏ!0ÅìÀ¿„&A€PM¼·X³%‘xİfYÜ\\®í|YËYÅ’{.¦y×^}Ñ+Iä´ ‰ÌÈ‚•ÚFÊº¢ÓíR'Ü¯URZƒ3A{X\nç¤¹Q‚ÜÊ¼¢6ÎÕ|6ÅcÈ~¾@¸kh;o†0ê|È…ˆâä-;,~F!”÷3ô1éz:y7 \\‹š’†Á†Ï”ûv©:Vcâ™M–7NÙf)¹m'CBDnMTBÊÈ§¼\"\"•d3@‹";break;case"ca":$g="E9j˜€æe3NCğP”\\33AD“iÀŞs9šLFÃ(€Âd5MÇC	È@e6Æ“¡àÊr‰†´Òdš`gƒI¶hp—›L§9¡’Q*–K¤Ì5LŒ œÈS,¦W-—ˆ\rÆù<òe4&\"ÀPÀb2£a¸àr\n1e€£yÈÒg4›Œ&ÀQ:¸h4ˆ\rC„à ’M†¡’Xa‰› ç+âûÀàÄ\\>RñÊLK&ó®ÂvÖÄ±ØÓ3ĞñÃ©Âpt0Y\$lË1\"Pò ƒ„ådøé\$ŒSÓŞLà®\$ÓyÉò¨ü†ğËÎ)ínÔ+OoŸŠ§M|°õ)àN°S†,ê,}†ÏtÒD¢£¨â\n2\rÃ\$4ì’ 9ªŠ²’¬I¤4«ë\nb*\r#ƒæ)ã`Nù©(ÒË£(9ºƒ\nHã0K« !£îú†KÌD	(ğÈã+Ğ2‹³ &?ŠüP\"¹‹¬ICãœB»B Œ(8Ü<²HÜ4ŒcJhÅ Ê2a–n|Ä4ÌZ‚0ÎøèË´©@Ê¡9Á(ÈCËpÎÓÄõ1š¶¨^t8c(¥ì(š1ØƒÃzR6\rƒxÆ	ã’Œ½&FZ›MâÇ.Ì“29SÁ¤92“W ˜e”·M¸ P‚Œ¨«q]\$	»Èãs\\øìÓ¿cŠ„î1®µŠOYU­n\"“6\$ö4½fÏ¶…`2ÃsÇZVÒäGL€\$Bhš\nb˜2xÚ6…âØÃŒ\"íT2ÕJ‹Ådƒ3MpÉ%8–€İ6Üì€¨7«‰ô®ü²C­O1ÌPAL¯“ñ (ğÎ0¯.0İg&«Ëô2…˜Sã[¾b˜¤#eÃ²şpA‹KÒ=nØé23.£k8\n%6§“MÄÊb©Œ`”Ò(ê†ö!,\n€9'EBCjzŒU·Zg0îM”<MÚ:dë®”ëVòğäÍ¸ã	²«p“¨æ;®³¼	¼²š(@&ƒC(3¡Ğ:ƒ€t…ã¿L#é´Ú˜.£8^ïõğ+¾ŒÁ!xDÄ\$­ˆéÎ‹èÜØ5„Aò(úÎspxŒ!ôšÈ@ß;˜ÈÃ8ÖnÏMÚó®ÀÓÊ¿0LË	íÃ­”	îî!\0 \$\n0Ş‹ox@@*!L9\n\"ÒÛ}¯r®üº^È)yhB¢.µ´fœr–%‹L­„LGIĞ 'µÓ\nEP` KAŒÊ'DVTIˆL6Dà£P Â˜T É‘—“â0M:í2M)PÈNRCÈ®˜8ñI_(­é‚Àì€Ú	%d%vªf‚Í¤3kpÚ©’>ÒÃwL(„ÂGÇ*>ÔØÉëğY°,3#Ğ˜Xi/&0š\$ãX©'NPz9­²<¹Ô‘ıY¨z=½“ŸÁ/\$’=È=\$9š\r¯<4’³\n¸”{+emÂÙ)%‘S0¤u„cdH™âA\r€¬1ŸÀÆÒåDGS.0¬É3(™&!×Áæ³Ce¡T*`ZêĞ1Á¸3ÇÓ5K¬‹fy\n\$'/šÊi'Ù¨h\n1xd\\Œ›äÂªÖz\$É€Ä˜·'ÃÊ÷jÇ}O¦øjbçJ(†Æ<õ³ûNú˜#S¤É÷“Q&–ÒU.R<ØHa/eÔ˜…¨	Âã]¤È7‘ó¥G\"¼“2ì’Ôï7æ²|¤ä\"j¢pôC¢R`˜©Ššæ7‘(©•@[ÄÑK\$V¡(ÀäaaÜ%[¬ŒÙNÔfSRñ\0¤cÁkÎ6aĞ";break;case"cs":$g="O8Œ'c!Ô~\n‹†faÌN2œ\ræC2i6á¦Q¸Âh90Ô'Hi¼êb7œ…À¢i„ği6È†æ´A;Í†Y¢„@v2›\r&³yÎHs“JGQª8%9¥e:L¦:e2ËèÇZt¬@\nFC1 Ôl7APèÉ4TÚØªùÍ¾j\nb¯dWeH€èa1M†³Ì¬«šN€¢´eŠ¾Å^/Jà‚-{ÂJâpßlPÌDÜÒle2bçcèu:F¯ø×\rÈbÊ»ŒP€Ã77šàLDn¯[?j1F¤U5›/r(ß?y\$ßºâ¡±Š¡»”Í¦Ö´JòMxÃÉŠ‹(¨³So\0ë4š‘Êu¾˜=\n Ü1µc(Ö*\nšª99*Ó^®¹ïÃXıƒ˜Öa¯£ ò8 QˆF&£˜Ø0B#Z:¾­ûˆ0¡Æ)02 ô1Œ P„4§£“L\ni©ŠRB8Ê7±€ä4Æ¢˜Ê=#Ãl:\"µ-ˆå²š‚	,D7B‚,4‘B9·£œj*Mc¤¾üÂ‘;éâî'5n¢\$Ü\rq J2Âı3Üû?ÃTù??K˜0Òàİ„°\\”˜böL-CÌ5Œ2t4ÑàÊ‹2ˆ&&ˆ‚5Æ`à9¼Â(Zñ£\0PŸNi¬G\nK¨³P6´ƒ.V£#D;[ËUÜl<'d¤Ct>µ˜ÂŒÀH…f6uq1\rÖíjÖƒcmYˆÕŸZ(ÕÇk#šVı˜„|°\$Bhš\nb˜2Ãh\\-X(ä.ÕÕ‚HŠ/àPØ:JrTÒ2Êu¼ß1²2ñ3]\r.ø@6Ñ£B4‰\rc¨æ¹ÙÉ¼İ1N-0XY*Œ69…;?íı6Ç\rƒlãXæ=\rù™eW83‘[—æ93ö¿#RcWœÚxş{\r[:\r‰§Ú&’dÚNT‹âùjk¨fZk«g†u>gƒs`Í\"5Úh^êƒZxb˜¤#Áï§z˜Ì”¬àLæÚºW‹eškL›¾CI0£C³€Ë²™*§-Lƒ}¤€È Ü¸cù2k>˜eêHœ'S‘SÑ}-¤;Cc”ãåónÑ»úœÍÌ>ekë¸6Òîô¢¤“\nÓhÃE’ì÷½øÃÂ‡ú@2ŒÁèD4ƒ àáxïõ…Õ.ëŠÉHÎŒc˜^¬¿cwt„KğÂƒ:0|A|1\"0ÜÁ>	!´8´Šyû€¼0ƒæ>Œ™L*¼À-ØkHÁ(ÄÈ2’²ò^İaòG}	–œCÚqÜzÔ8:Ã\nÃ08‰#XŞÃh@\$\0A\n¡`­WÎ\\\0RŞ øtu	0<ABqƒ¯bèŠ!¶³^>G¿2^g	›¯v„í½œÈìÉÑ5p¡iŞ<R8êËÊAÌ•µâ„ÇŠƒ:@'…0¨w\rkÛj§¦Ã\rú%Â:™Ğ@È‹xo5èÓ`ÒÃ©Ã®\\Ô‡\$â†0 ¡vøÂˆL\$¤œ«ÒæcÑ#Ä€‘G\0ÚâÉ6ÁR#òaMŠ’íT&f&Rãé:\ræ=<§Õ˜oÃ™ãKEí¥Ù¥5\røbšæø5šğÂPƒÒu\$zh§€ÂT&²#'æàMØ¾³Ò 4f•¬Í±B“]š|#Dê—|ŸÔ'-˜¾º§Í4«º…Ôš¼€PCb°‡>Ú™8HVœBˆËç+‡150ô°\r)ŠARÑ8Øòì‘ÈBâÌ2N§.B F à•ÏyJfJÑŸ´Z€Ğå¸*8r©3®„³\n™Chª5MFÔ¹ÿEÅ|P\"dT‹‘’6OĞÛ\nÆÑ’€©êŒŠf+pÔÒÀô_Ö0\n†„;–G){ª4…ù3Y0£PÑö?èÏDò€+Ù‰…Mˆ-òZÊ);.Â´‡‘òBhN¢f³²ğ‘Èƒ¼x	´!	ñĞ)ĞÖ¡Œ³t!æØZĞÖ¢‘¡ÒoÙØ¢#P•µ\0Œ…À²2ÍÕˆx™\0*Ü°¬TË‘üä3…ÅAAPÀ]tH‹ŒÂŠ\n¾ÀÓ\\†À";break;case"de":$g="S4›Œ‚”@s4˜ÍS€~\n‹†fh8(o…&C)¸@v7Çˆ†¡”Ò 3MÃ9”ç0ËMÂàQ4Âx4›L&Á24u1ID9)¤Îra­g81¤æt	Nd)¥M=œSÍ0Êºh:M\0¡€Äd3\rFÃqÀäl2ÃDó•;äÆè1PÂb2›.0S\r	†¢ĞÑÔÌÃ^L¯7¸5[Y7Dƒ	Ún7ˆS±¦á-9ˆš©ÀÉ\$ƒ\ríUşá4)œ\$Ğ¬H+s»…œ£ÇX€ï&’Ãp–\0Ó%Åó°>ûu_Äˆ83s\rI\n§ÇsxÌvC\$E7%<(ïXäaŞˆQÓ©Ónê¹ô,¤z8†ªÎxòİ#Ê@À\rÏ¨ôª­‚N2«#¢¶9*	xĞ¦œû!j83 0š„*@oh´0¥ojˆ:¡\0Şÿ„ÓFNÀÜ5Œ££ ù .ğä	ÑÈôãCX#Œ£xÛ®£(&)ÑØŠ29ã|\rAK 0©c¼¬:IãxÎ€RÜ»/ î»xáH(ê†(m€Ü9¤ƒÒ ˆCÊJ„³Äô—CÍ\0ĞA l¥·Ã«xÅ0b¶1(Ë˜ä2/ŒSæ££¯»ª p’B2Á£<I\"…©ÓL\nÕæ:C(Ì3BÜ4;ÏÄœ ŒP²1Sê{VŒ-0@¿µU†°ÏˆËd4ÍM˜—YÃBš\rRÀ\$	Ğš&‡B˜¦,#h\\-WhÔ.Ô“•–:c»½±Cehß!Œô`Icb8Å\nƒ{B\rÃËµ9ÑÃ\\9ŒÃªx6LHæ5C–˜Ù(ò¨ cjúŒ¡@æ¦‚¦)Ábac;!}(Áp@ıGH4¨ƒÒ°Û‰9{ ½­—`Û6\"i€0##ˆ3èƒ0Ş–VªûpçÓÏÚÈ)oÃP-*¸ƒ¯z»í§m|Ş†ÚéúR7c¦s¢/š0Â7`8h›<(há.^²µ¤<Mj2fÁàÂÍÖ£0z, àáxïË…ÈŞD¾At¬3…èïB<:BB„M¨ä–œx¾1#Q¸D	#hà¸IoHxŒ!ò¢ÔÉm”^Õ`úúš¨7C–¬,šƒ£“ç¡š{Å‹‰İ\$®yËàA8JÈ>Ú \$\no£é¹>²<*AHA(£ò³8Ä0‚«ñ™ÂIh@®›ÊÓ	!¹©<¢HI\nT…l¢pN‰á>%\0¡+ ôŠ	â0Í58?C `’.¬ä™³söA1W‚Ø…˜@ Â˜T{ä‘Å˜Ğ@QÃyKfÁH2´àô„Ï{ğ0#”‚”Sr0_Å¤µÓ„A c]± f>ŒY!Dœ:õDeÌÈ mÜí;pŞFÖZ(Ä(„ÂPiˆ1¥qa*–qIÈpM<”\$”Ù’şA®•:ÃsHSÍ2ÉĞûHezäRr‘é0ÜcIi2/5c(QÁ<0\nĞ7«xÕ la­I-¥L‹¸e9‡9¡‘ÃS¡.&8@ÕèTó#ÁT*`Z	ènh¼êE\"ä,yKèˆ-âéNò8Ñv)M)>WZôğaï§ü¤K(%D±l²b{BlÌÁäóÂª\n‡„j/ÙoRÂ#Ñ\n)%o+Ñl=9ñ\0ÿ²™-Êäº_P·­äœ#:T?	†4Ô¬Î¡¢wšävIÍi6PZG%Á„6œ’ZŠğs_…À1’PÈ^X¢™AÂM2{]¬z›êÔè¨â0™q0&Nz–“©8¤CŠäÁişp€";break;case"es":$g="E9jÌÊg:œãğP”\\33AADãx€Ês\rç3IˆØeM±£‘ĞÂrIÌfƒIØŞ.&Ó\rc6ÀÏ(©’A*–K¢Ñ)Ì…0 œ¥rØ©º*eÀL³\0(`1ÆƒQ°Üp9&ã;\ruNÎF“=ŒÂl‰Óê'C)¸A&Nsi¼Èi3LrpQÎrƒá\"‘kÔAˆ¶ÀaW°QdŞu'i:3k;cæx½Ş*u87K¼²1xÌçY>¨ä\nÙídâÈ€Æo7,{IA–ÿ&7\rà¢nÆgÜq6Ñi	º\r%İ›Î QÙ\"·mÉ7ó|ĞU9á\n¡›7ì:Á„Sq„A>/XË§XÒà4ª*¥((¨òû*J¤˜\nƒJ4Œ'Ì\nÄå#/`Ê6>c›ˆÿ¢k0Ú2²`PŒ2¥o³z4-C!Œ)óêO8)8ÍÀÊòŒ®Ù†VÅBd“nëµ<ğÒOn¶½©´z7­£s¢İ%\rû‚9I’r&:ŒªhÈ»nXJ2òº3Ë3¢àPó6­ j„œèÅnş1&g)9NJ@ƒEBxå0‘ğÚ4Œ(Ç>OÒ’úÉ0‚*hÑB ÊÂÃN– ŒƒSè:#nèÜĞ°“PËKÃ­PåÓLÉUŒ-1W\r1j6˜1D°	@t&‰¡Ğ¦)C È£h^-Œ6ˆÂ.B´Ú;ãÓw+?£K”\rÛ™4.Sn&J½*\réÀÂ77¯¤5G¢ã˜Ì:Ãd ±abî97£ÏZ®ËA5Qcpêº˜S\rã[!ŠbŒêÈ¿X´¸6Ï´S×)Eõ5hÛï½«PÛ|Hé{˜·ÛĞBwR=)…411ÈºL”3CEFE¯ÛôŒ Èä\0Ê\nh¼û?±ƒ€Ó,5WòHö½éCÄ>PÓ|ı3™XA…K¹š½.‰@à½cºÕY“2Á\0xû\r@Ì„C@è:Ğ^ü(]á1\0\\µázëÇî”7áî“´ƒ¦ø/¯#pÖÂJFÃîxŒ!öŒCã¤Q2Ti‰\$#¢3&ƒrê:&[4Şª“ÿ)	Î{èû?;øºòm( \$\n(Ş’\$ÍR0(¡J† ‹øæ,Hò¦<}Û\0Á3ãŒcYªa89¯d\$^B@Á¤yPáÜQ–öTTÆÅì²P{‰q(!ÕÒšÄ‚€O\naPûš·ìMâºw“æê uF‹!‚LM	±\"°.’ô}Úš\$8L…±%cBÂj<Ëƒ]BúE¤¥2–À@ÂˆL=¦ˆ*€@‚£Ñƒ¤…ü’Wj{HPm «‘Å\0¤¾ÈT%<ÕXEâ	Á~|æ2Åó\$Ê)Õ:ïU™&¤v]\"ĞaĞÉ]+Ô£Y¥Qğå@†vÃ`+g|1½ Äb!( d+éµtqÉ:ú&&;#âí™áÕT*`Z°n7åü²Ôd#DTz‘õYøÏÈÁ\"–rŞ”ò0ƒÈé‹d}G¼3wÍ‚*/¥ü3•’Eà	É\r.íM£CôúÒA\r±¨À˜3nNŒ\$°ºÍr@~&ÜÌ}U,Kfh¶™3*\r	]Á”QQf\\\$ğ.„ZsçèoˆsnH¢LCS\$°òÖ…&‚×Ät7Ç”8õH¸æ!tˆ­}Sn[‰jgï’*Ò0„|fôg¥Ë—”‚L‹ÌfL„\"É‚P©\$(";break;case"et":$g="K0œÄóa”È 5šMÆC)°~\n‹†faÌF0šM†‘\ry9›&!¤Û\n2ˆIIÙ†µ“cf±p(ša5œæ3#t¤ÍœÎ§S‘Ö%9¦±ˆÔpË‚šN‡S\$ÔX\nFC1 Ôl7AGHñ Ò\n7œ&xTŒØ\n*LPÚ| ¨Ôê³jÂ\n)šNfS™Òÿ9àÍf\\U}:¤“RÉ¼ê 4NÒ“q¾Uj;FŒ¦| €é:œ/ÇIIÒÍÃ ³RœË7…Ãí°˜a¨Ã½a©˜±¶†t“áp¨QŸ–lÛï7×ŒüÕÁ9äóĞQ.SÃwL°Şìëá(L¦èG›ye:^#&X_v ¤RèÓ©‹~2§,X2­Cj€(L3|²ˆğÄ4Œ€Pœ:£Ô  Îê†88#(ìŞ·ãZ‘-á\0000°€!-£ä\nÉxä5„Bz:ëHÖB8Ê7¯èµ/âd\nH2pÓÅğCÎ0·ÃrL³½#Ş‚B`Ş¶\"¬	Nxí ò\n†K.ª4CPÊˆ ïò¤„³Š2:,ãË3 PHÁ i@† P:'@S\$4¯ŠV‚°LµB€Ó6/â£G(ĞÓ\$¡jVå	q:R£*d„Ò‰¸Ü£C-ªHÜ¤”j©5Í£¨tü/cr<B\"@	¢ht)Š`Rª6…ÂØóg\"ì`‘·Œ`É ÅCd†À@ŒÜ_-K‰qH67Ë„®â±ƒÈ@õ¨CÆÂc0ê6/Ú9…0åu#:2ö!UãŠ…<ã(P9…- ß£\n¦b˜¤#_#ƒÔöTsÃÒ²Ò6İc«v4¦±Æß\r—³¶”¥ãrzÂ¨Í¥à4Êò’8UL’–a«Ãû‡*™“š\rïfŠD£;Öªb¸½ê¶cŠG.±#*j›°°\"T€qÈä»„ØƒÁ\0xßÊ3¡Ğ:ƒ€t…ã¾ì\$™Xä-#8^úoãÃX7'Z(^4ÑsH:m¢ûdÆ\ra|\$£‚ Ã xŒ!óğH-pŞƒ´÷DD*IT	†§¼Êj\"ª\nzôù\r/ ÈïÛƒ•¼Á%Ib:^mí8ÓÑº(	‡iÛ>Ì,j¤a5ü5­;P×D1Ö´‚½¦ğ%®\rÉZé×~‚°ËÖÊôZ*¡íH]ú”¿4¨)ŠoµF¥8nŞ@Ïa\r\$Èø”\"ˆúÚrâQÉ?´ ÇIy€ÏÄ¿1ÂJƒ@p¦\rZ‡C(e\0c1‹­ËòHÒà€)…˜1¢c°`¨ò–³¨rªIÔÌ•™ƒwHôÊÈèµeÆí˜€ ªÈŸ”He¬¼©‡4›thä:˜µ´u›Æjä¼5\$÷f«rWiÕ’œ±_éÇ9(¡ˆ\$0Ø\nÃY3‚J˜6¸dqqsu°*…@ŒAÀ >ÑœÒjå	[_*Dq:‚Ô_‰©q.dm“\$¦OdQşŠq0‹ÙƒÈ\n1fd™%´·yƒB'ªöMÕÅF\n:´oå¡È0Dl7’j*Œ\rdx6ãBLNâZ\$‡5,ÂdÊZII«/òVK©“‚íIš·*n]X!¦]¬B!-”´U@Nd‰%R@´Ï%NˆB[2ïìÿ\\‘ä\nH@:—ÉjB ‰	";break;case"fa":$g="ÙB¶ğÂ™²†6Pí…›aTÛF6í„ø(J.™„0SeØSÄ›aQ\n’ª\$6ÔMa+X¶QP”‚dÙBBPÓ(d:x¯§2•[\"S¶Pm…\\KICR)CfkIEN#µy¼å²ˆl++ñ)ÕIc ‚›kÚÅ¶²m¬ÛkFÚÕ¶¶m­Ûk†ÚäØWM‘ü…k8ÂXbUüB2`±XöXœ†Ï@¯Ä\$rÒÒÿ³«/ğÕ¼!°Øòp{5 ²o:ˆ\r±”@n7ˆ#IØÒl2™Ì§1Óru8'M±ĞĞiâ&.\0ºÿ/Wf¦(~¾µUDSék9Ïö†“qŸ»Ùˆöñò]†RØ\\Ä±4u…ZşY\$É±Â§¥R¬••èR:B P9N\"ÑRÓ¥e’_!Œb£¡e<(¸>)*ÏÀHs\0••	Ò”ÌÓ&¡„\nÛÎœ!\$*ÆÈ¬‰ZU0¨:Æ—!\$˜@%Œü²«DLË3Esæ©Åh:ş³–‰ñ„Ã¬ûTÌ‘ŒLªTBPRÖ\"eœÄÁ¢1Ú#¤CÍ=	jFª*I\n„©l´Š™#¤pòJïÂL±ÈÔ#T/å5NìQ_\"Ã#ï8!ÀHKI@4¤x<¸`SpˆZuj¿•+RD#¨Yc!Õ%::€¬åRM!,Ü Š<ÉQkùròM	\\yÖÌ\nBT#°Äv§§l˜‘<\"TÆK<Õ\rÌQ²À[,kñ²_\"Ÿ5ÖR\"¤”ŠŸr·*su0I,ªWÒÔÄà€^Oµz›»0§v¬\$	Ğš&‡B˜¦cÎ\$<‹¡hÚ6…£ Éª6LPúAPä:\rGB/ì\r¨°B ŞÜ£Ü<„¨Ü9£Æác0ê6`Ş3½ƒ˜XâY Â3Œ/`A§Rá\0Úö®`P9….³Y;PU²T’GHp\\ú,iS,”'¥ËO‚EÁ\\5Œ£p@!ŠbŒ¿ìÑ«@£ÉáT’ÙLÙY{1dRÑqà)÷\r³GÉœ*²Ê¶}2MIœüİ’ê‰³\n\"‡Bé·¨!=!lrqªû\"Á³dò¼]^Ìg 	£ææM×t9ãxåI£Àà4C(É±‡ƒeäŒÁèD4ƒ àáxïí…ÃÉ©Ã(äxC8_¸üãÃ™›#xÜ„N(Â98C§¤/º™ÖÂHÚ\0mn!ĞğÂŠÄ€G87©#ŒÔƒpiáĞİ>&bøCptkK9\rF¶AË^Nn…30h<¹q D!q¡C@ÈÙ›dèÍ,ğPPÁI%VÉ!\$tLìf*%‰Ë'XAÓ˜ØWĞ©\\”ÒHA‰S&‹ÈÅ¡ÓOy+Kä­ ¸‘^ØİYu¨ÀÍ ô†RHX´l‚HD£R£RJ_Äõv#îYÅ‘-<Hí±ÆâÅ²O)®5ER~|Éâ<„}\$’HÈˆÙOÄÜ¥–rN·qI&¨\0¬0ÖOÎ±¯6!™3X\0Şğ yÁˆ4†p@ÂˆL˜ß›c|ó‚0T\n¨7) ÒÿŞ\r0P3 ŞHÛâ6¯D¨²\0Q†Áı. \r…DTdw,hZ \$(À£\$×'Ò\0ĞÍEİ5¦rw ŠØÄé¨¾I,â›3¬•Îè¼‚tA°†0ØCkºU\0ìC`u9¬Â†ÌÍ&ÖÒÕ©Wv¶iÁT*`Zqt4öf¢OM,O,	èÉÅéáJ\ns³2ó˜ ‚œ Ô	PDÎ¨ãW„45!Ê@&ĞÚ‚ÕM	M ×d–Räe3¨Ò„Œzo3±ÜóÕ“âyäò3…ˆÚFöOŠ¼UWXˆÍSMEj\nšÈœ·À%@d=‡º¼JÚğ±Ê:SœÒ:_aT(‡P–v£DÃ)Àg1ä†*ÎÒ†,¨•š*dY—JF*™] d‰%U*ü­Sê”É©JèMµhô\"¢À.@";break;case"fr":$g="ÃE§1iØŞu9ˆfS‘ĞÂi7à¡(¸ffÁD“iÀŞs9šLFÃ(€È'4ÇMğØ`‚H 3LfƒL0\\\n&DãI²^m0%&y’0™M!˜ÒM%œÈSrd–c3šœ„Ñ@èrƒŒ23,ÜX\nFC1 Ôl7AGcM+4™â@Qêc:›¤°ë\$Üšo2f0ÈÙ¸æÃTœ±—ìDå9Mã¤Ü­„›„æ±”ô 8a2HI’Ài:BcÇZÑ´Êt¯ÉXjªZ…î0v9\$ÜŠnÉ^{“+rVéÆ3y¸é:Ër¿WÈ2ò·;n·¡Ò®ã²*ÑÂÁ3‡›¹Æc1†Íœ›ŒıQW®6\r#›+£ªz’4ã«ÿ\0¥£`NÀ¤ª2˜< LpÒê¡*Š¨«)*Ê¶¡9k(*#‚'°Â6€Pœ7£\$‘ZJÛ„D\nÉBĞ0˜esKØÓB“02Œ#¨#²ƒ ¯¦©Ä#FîGoì9ÆÑk§(ÍCU/°Ttë1I”W¾Kğé5ºê¼Şêµb€Á:Ã,\\°Œ£`@È\rŒƒÈ:\"ƒ @7Œhè„´UG#H8Ò\rÎğH…á gN†2HÊ™¡•#šÑ%(òYE˜eÌF9+2°ÚØOÂ\r8BQÑXP P‰?\nc¨ÔÛB€Òa•Zß+È¾ƒ,e\"6É\0Â3¤©Ô¦È+cu¨ÈÔ…lÌâê©ÖùSpÜeHæ›¨ˆÜ0¼¢@	¢ht)Š`PÔ5ãhÚ‹c0‹«ëè¤Áª8ÈêÌ…¤Í¹µĞäÒÅ¢# ê\rÌ„ï\n‹\0à§¡X Ë‘±ÏHÌ9/ã£²„ ab·mZ­<ËL­,š“_ÍÎì W.J7äó.A‘NJ!—æ9œ9æÈÁœåæ|:èm¯YĞR›ŠƒxÖ2¢\"¦)ÏJÅ\0(ÎŒ	'Í0@Ë•;E©ˆ¦	XÚÍ!ì’n¿nã*\r#„¹Àû³ìë´ªÓXŒêÚjo]\$„>8Hø¶mq­:„lç´N°óvkR`ë\rÛ|È’µ)»Íó¥K¢'CC\$3¡ĞÜĞ^şH\\0Œ›l•Œá~ÑéB›BBê…áv0Vàéà‹éğ5„AğšÛ·7\rÌxŒ!öP6'Cl¦41\n‚0¦(ŒÊı(n5ÎÑ=/‡Pˆ‚+ÕBÉà¯zq©B=	¡W®ËB€H\nd:‡T±	DºÀNWHs#Á¸‘TÒéÓbv;¤E¿€êÅ‚™F&IlRCk(>t¦²Ld©w@Æ7SN“C:‡%¨ia1HB€O\naP²`@Ã’øBGE%\nÈ§€ñºÁBM›Êëk‘B)F¢tÛÑÛ(*-tÕ“¦@LOÜa†l¢…<h\rB€A!À6÷˜KS,`#å ¬°@ÂˆLLÅh#H6² D¸”¢XVŠ0p¸’ &6Ê 'PŠÔ:U*aï30yX?gtN%©P¢¥CËeÜìLI1\\“YÌGQÖô¸\\B%7‚nµælÅš2æd&ÕÈ¹¥¼ÃPë¬ëKy¸LDŞ^DÜ!•ğØ\nÃ\0'dÓ™’µãÁ´‘3ê\0N‰’VPÙ	*å(9ĞŞM,åb©ô¶ƒ¨\"»hT*`Z&ºŠ@œÁLi¤»ÕI+—%–pQ´†¢èU+²š‘¯26JœÉde(’+vTä‰Ñ„\$€(ÃÏğÆÏ•!Œ×­£Ê”\r@#Sù6˜ÃüŠcL¬%ÄÔˆ‚*˜bÃ“Ú6fÖtÕ‚ú	,ù:%m§âŒ¡bÌGˆùî-ÅQûİ%²1Ò&V&Èa\n‰ªtp2ÒRòÀSx3&m®®cš„W‰ÁŠ·PÁJ=‘¦æÀ˜>cå—9µ!S*hù+M:ZAR%jøF‚D0°";break;case"hu":$g="B4†ó˜€Äe7Œ£ğP”\\33\r¬5	ÌŞd8NF0Q8Êm¦C|€Ìe6kiL Ò 0ˆÑCT¤\\\n ÄŒ'ƒLMBl4Áfj¬MRr2X)\no9¡ÍD©±†©:OF“\\Ü@\nFC1 Ôl7AL5å æ\nL”“LtÒn1ÁeJ°Ã7)£F³)Î\n!aOL5ÑÊíx‚›L¦sT¢ÃV\r–*DAq2QÇ™¹dŞu'c-LŞ 8'cI³'…ëÎ§!†³!4Pd&é–nM„J•6şA»•«ÁpØ<W>do6N›è¡ÌÂ\n)êîæpW7­Ñc\r[è6+*JÎUn\\tó(;‰1º(6?Oàôÿ'ïZ`AJ–‚cJ²92¬3:)é’h6¢²­« PŒ”5Oëşa–izTVªŞÀ¢ƒh\"\"‰@ô\r##:ğ1e³Xò #d·‰f=7ÀP2¤ªKdï‰Š·:”o‘!BRPÃDŒBP«ˆ\"¯£=A\0å­dĞÔªêÌ\0Œˆ2h:3¤ì¢OĞÅ;OºŞ7\ràPHÁ iD† P–¸sşPCC°ğ\rãÄ˜©ræÅ¾£]2«#£Êb–-cmS	m›ÿ/kxŠ£k%É.¾4 Î<B¼‰óGG-ƒevúÏC-i[C	@×dŒ`]<Î¶ujÚ³ãe¦^YVµ°ÏÙöå¥jZÀPÚ‚TÑ\$H€t6ÅÂØó{\"è\\6…Ã *#“¶6\$ RRÇ0(ÓXÇU¯¤ÂúŠƒ{_Z´a\0ê7c¨Æ1°£˜Ì:Ã Î»abB9)€Ï[\rÁî¥Î£jî:«!@æ¦æ9Ê»G9!\0†)ŠB2`=\rô%\"ÌÄp@%Ú“«Ô9&#ÓT>cà7Â¹HnèÂ£n.5Œ,’¬hPÖfØèÓ¤ÁH@Î¹*îÊ´Öl)FB„\rÃKŒòìûJ¤Ã#(ÔŠ`Y3*Û9Ó<Òƒ½%ĞÕª8ïäØ?ƒ˜ïLÛ#Àà4©&œ&#B3¡Ğ:—^ı¨]]fHPäS#8^„wãÂ³Œncp^8c–î:u¢úú0ÃXD	#hàÛmC xŒ!ô‰)4´ê§L&\\¥##–(ä¦ârî¼ì0r5 SÜÈ3õıº«Ò¬ã<^×[+ nÀ\0Š~‡XÄÈû9glôT³ó,ËUÑ¾\rètœ«RxOŠ‘+Fu.\nÖR’ùG+.˜âVª™‰“3æÂ@t‚É¹ñH`‹6òbxS\n„ÀŞ‡@BĞ”ˆ¶\rfç4êÕ¢!ì(Å åFLƒú?Èè”D÷¾AÏùVi„U®šcPŞƒzá½]C8 \naD&#jkM¡1ÁR=êOZÛ|äÈ9PAáB±T”'lšÉbé'21d~ÒÃ¢é)‰À¬HÒ—lX&éêJ’]ÊË°Zò‘8È×ù*\nJ\\r–WœébMÂt>`¬1”\0ÆÛÚLn‹°:š×ÈºÃ iÌ¥pÈ’*)NQ—…P¨h83åà‹9FH°reÏYL—°Ù(—áœrsN„õ:¤å?òˆ‘òBHä2\rg¤ıX=^LKÙ}F'–nÌ°^I\\K!Ü)%ñBÃJ]:aÈÂ!\$ˆ‰ü^¢tUúœ³RlÍò¢1q’´ør›yd’LÒ(¥ƒÑ7;õ\0003C°¤E˜\n	‘²d†ãÉNãjë)\0‚\"ùŞ¦gMH¨æ8•‡3¦AM¢;SDí«¾Ì°c…j8«5“¢œ )êÎÄFETr=\0ŠP!BÔØn_õ´¿\0 a˜ p-bZ§#¤`¨¡Õ:!”";break;case"id":$g="A7\"É„Öi7„¢á™˜@s\r0#X‚p0Ó)¸ÎuÌ&ˆÊr5˜NbàQÊs0œ¤²yIÎaE&“Ô\"Rn`FÉ€K61N†dºQ*\"piÑĞÊm:Ïå’Á€Äd3\rFÃqÀäk7œÍñàQ¼äi9Â&È‰¦…¥É’Â)’”\n)Ü\r'	ıÖï%˜Ü%…“yÔ@h0Œ¢q¼@p·&Ã)_QËN*µDÑp¨˜LYÉfÛ„ë¶iÅFNu›G#Æ[ñÓ‘„ğ~Ö@¸Üp›X,æ‰'\rÄ¶G*0‚ˆò4ã£1éˆ#æîï\"çE˜1ÆSYÎ¬n¸Ñ¥rÙ¥@æuI.òÂTwP8#£;Æì :Rˆ§æÚ(ºõ0¢Ş¶HBN	LJ<ïã(ŞBCH\"#2–9Kê”·B„·èD&¥JÈ>è¬\09\r©Â;Ñ9¨PÈ’©NÈò—L¨!hHÊA¨!± Rü§¨„Š²\"–„‰\"ş‰ /,ZÍ#C\0:C*é-óxÄ5=€P˜0µãHäï	só‰#!ó„ä™L‚â6'H:Ş6…ÀHK#¾ó“Q)S7FĞClš7îˆ	¢ht)Š`P¶<ÕƒÈº£hZ2“XÙ6¶ŠX6BLNÉE\\ä:¦(ˆŞËG£pò\$¸Æ1¥ã˜Ì:Ñƒ`Ş3¡˜X¨VXÂ‘!ÃI£h@ê«˜R–\nƒxÖ„¦)×Ü;.h˜\\P4}˜¢'#2Ü¬Vã’š“ÑTİŞ6X˜4F¬¤	—,zbÜ(#Z¤35¸¦,¤ÛH{6òË‘È@¢[	dp«&HÀæ9ët2„üŞ_aâ4N#0z\r è8Ax^;ér„6ÂØ2Ü3…èî¢<=ëŠÖ„MHäÏ™ø¾Õ§XD	-{8İà^0‡Ï’62ƒ@ß#–BÉ©LºOd££¢øöê¸ª¤Š6ÃæŞ.ÑO\0¾\"€(&éÊü2b	ÈP£…*Š¦Šåœ:ü¦BÚÏ¡Ån2?ƒ¨Ú¢\$’\"¡½®'UÈŒéÒxŸ8ÌØË*WÛ¥? Â4iûä–DŠX@(	â˜©Â¨˜bf˜`×äáâ­\"ŒŒ,tv“z›Ô7?¤‹@Ü3\r(üşø¨ì[m«Ek(J‘ÚŠbˆ˜}à@fˆF\n@œ\$sˆqo!˜9!ò¯É9|H%½D0•_ŒÔ>a	±U1‰Óßbá¦	\"TÔ0G(­(Fûb\0|aÔ4À†„ƒ`+jÜ1‘RÖı0u2mÔ·0Ò–YJ%İ³pF‰2öT*`ZqÅÈŒIHa¥ÛòÜK:ßAdq¦+rH^S’7ˆÑ ¤àH\0PRNJh8ƒ|vÏ#Æ)kœÚÇå˜JËo#ÁÖ0@ÜÈØ©„‡|¢,Ë1§E07”#‚¤êG\r¥¸É½¥	y\nk\r\"H,¯Œàc*ÊÖ4¦“\nOlE\r–]%s®HCO†¤½ ‰Š£\n\n²4'‰À";break;case"it":$g="S4˜Î§#xü%ÌÂ˜(†a9@L&Ó)¸èo¦Á˜Òl2ˆ\rÆóp‚\"u9˜Í1qp(˜aŒšb†ã™¦I!6˜NsYÌf7ÈXj\0”æB–’c‘éŠH 2ÍNgC,¶Z0Œ†cA¨Øn8‚ÇS|\\oˆ™Í&ã€NŒ&(Ü‚ZM7™\r1ã„Išb2“M¾¢s:Û\$Æ“9†ZY7Dƒ	ÚC#\"'j	¢ ‹ˆ§!†© 4NzØS¶¯ÛfÊ  1É–³®Ï+k3ëö3	\r¬ç‚ÕJ´R[iÒ\n\"›&V»ñ3½NwîÔÃ0)µ¤Òln4ÑNtš]¡RÓÚ˜j	iPÒpôÆ£ŞÜfÚ6ã«Êª-ãª(ˆB#LâCfç8@ÊN¤)° 2è¤ êµP Š½\"ã“³Âb‚t9ë@È0*İ¯£ÓÏ	‰ƒzÔ’r7Fp˜œ²ÈÂ62¦k0J2òª2\\›'ª Pó*¤`PH…á g.†(s¾¬ëÜ8°˜9/Kb\\éÀ‚l›µò<ç7¡jrÁ+ğ3³Ã¢Ì ¼C+İ¯ãs8¿JC,ô0£á×E®At£&QÓÚ9I-2ª(Òv7B@	¢ht)Š`PÈ2ãhÚ‹cÍl<‹ P¬Õ7®ô=<\r3\n69Ó¨äËDÂ+\nƒz1.[1Œl8Ì:£ƒdtã\0åhŒ,j×I\$²ÚŞ*@æ¾£xÖŠ„¦)ÊrJÙ:C ŞÅ8˜\r‰‚\"1µ/#ì°‹’ 3ĞÈèŞáMÊKiÚµZ&\$.:vó¿#,ŠÌ0ìB¹£é]<–Šl<n†/£\$0Û£d‹\"C’j˜¤R%ö	©Ò¨931\\[6*Ãğ9£%ø&F3¡ÑAĞ^úÈ]PÜò\0ä-8^ŠìcÃÊš¤xDÖT¢/ŒXÜ5„Ağ’6	’ã|õğĞ¼´xÃwÒC£32,–Ù[>9{3:Cš0ÉÛ¾ŸP¯\$’=\"€(!à´.M8P£)ˆçÓ½‚–ˆzB47FËkÒ‘ŞıÒ4ú ƒƒğÜ\"oÅø(0Hë*´dp4fˆ\$*7€7øOÍ„Qa\0 'Šb¥ø)\r9på¤ROóúŒfRO `)‘A\r-²ôÜ\$ˆğÎŒ3¿¢õLƒ\$_I)£[J„dÁ\0S\n!0 ×²‚£¤q©0™:päâ‰Y ´†%äÒ3HÇI®šfvtRD\"€ª\0›\"ØK„!\"Á¼£.CDaJ1f!bBgèyŠ™Å\\ªbÀŒØu\$a‰„Qb\$)f„´#)âsƒ`+gH1†·JrŞÁmy- Òò^ÙªÚŠ‡¸6’‡]  \n¡P#ĞpTq¹M¡œ–¥\"ÒL «¨AjZ?Ä\$¤›Ä‚*Œ¡;2³ÂûK‘t<DÁŞ²PJ‹“<Œá˜<ªã’E]ºC;˜XÌ^‹áÜ;jIl–¸½)ãA}ŒM³RBš!_0–¢¤v_¢Q2:¡½Pœ]1df|†–LÈS¥ÌXgB@(µ³ò1aéfe\$€1•D^ÖÒxuò¿È˜._‚c’…ÔÉØ³™u/Ï‚i!2ñ*‘ @D\\";break;case"ja":$g="åW'İ\nc—ƒ/ É˜2-Ş¼O‚„¢á™˜@çS¤N4UÆ‚PÇÔ‘Å\\}%QGqÈB\r[^G0e<	ƒ&ãé0S™8€r©&±Øü…#AÉPKY}t œÈQº\$‚›Iƒ+ÜªÔÃ•8¨ƒB0¤é<†Ìh5\rÇSRº9P¨:¢aKI ĞT\n\n>ŠœYgn4\nê·T:Shiê1zR‚ xL&ˆ±Îg`¢É¼ê 4NÆQ¸Ş 8'cI°Êg2œÄMyÔàd05‡CA§tt0˜¶ÂàS‘~­¦9¼ş†¦s­“=”Ğ(§ª4›Œı>…rt/×®TR‚ò‰E:S*LÒ¡\0èU'¹«Õû(T#d	ƒHûE ÅqÌE”')xZœÅJA—©1Èş Å®ƒè1@ƒ#Ğ 9ªˆò¬£°D	séIUº*òÀƒ±\$Ê¨S/äl˜ ÑÎ_')<E§¤©`­’éé.RœÄËsÄ<r‘J8H*ìAU*‰¹•dB8WÇ*Ô†EÂ>U#‰ÂR‰8#åÊ8DMC£ğÑ_ÆñÉlr’j¨HÎ³şA‘*¢^A\n¹f–Ã¸s“P^QôŒPAÒgI@BœäÙ]ÂäáÌDÈJê¼ğ<· S\\ˆ\\uØj”„áÎZNiv]œÄ!4B¤c0¯\$Ama‹ÉJÕ QÒ@—1ıM´YV¼–åqÊC—G!t¼(%	CÅ¹vrdÂ9(ÊEÆtœPÕÕ7YêQ%~_ÅúC48b\"s‘åôeÅ’dœÉÁÔ¨CHÂ4-9ò.…ÃhÚƒ\"©>YÈı\0006ƒ”Ğ¦e¤[N#ôòRAG€¨7µãhÂ7!\0ê7c¨Æ1·#˜Ì:\0Ø7Œïæ7c–Š0ŒãÂká-^6¼#«„aK˜riÌVÃD	T!Šb;Ì¨áfÆG)Fáû¬@Ç:@ÃäCjç‚Pç³Â>]¥Hùn({ÙI'ÄKÙ;SxgÃñ<\\ÑÊKü·1½b„á>ù¤øA ¬oO)ÚR–œGD5ª&Œ#›„96(æ;ã•^2€Ò9£ \\ƒQêÁèD4ƒ àáxïó…ÃÉ²\rÃ(äy£8^2ß˜ğáiHßú„MØÂÀt{Á|å40ÖğI\r¡ÀÛ×èà/ ù‚qz¯7X0†³XC¡°}Í	ö†àèsZ\rAèE	¡TTAŒñ ,…˜\0¢AÈA	„(CÄAQ!äÎˆ'P˜‚%.¤A–\$La*š†f¶6æàA“a.g*H¼Šä|(ğú\n¢|P\n÷O«ˆ™dŒI‡@¶4	‰†–!>ß\nŠ°sc”Q¦‹¿q7ÀxS\n„q–ş`Ê	5\$Ü@Á#‘«|‘ˆä_‘ò˜Šº\$Ã”X8tBáÈ`‚AEÁQĞ*j=”q¦I¡Ç}-¤ŠxFÓ\0ÆĞÚ4\rï¨= ÄC8 \naD&\0ÌmMa´{A*	Š•xio6Â	œƒxmÍ÷·Ş¶•¥Tñìø\"FÃ\$v\n‘SaÌ&Å¢PR3ÁÁ‘¢¨§¤ës†XÌ89âA§ò¯Óâ}Piú‚1\r€¬1†ÀÒÃX s`Â©Ãh0d4†f‹`FšX:¼`@ ønT*`ZôtñÆÄÙ&RDpN¨¸èX¨8\"\$p¿3SVÚÛ[«|šc\r\0PM¤”™m	—\0( éÂˆçáÎd‘”NŠ€¦G7YÌ‰“!d}9ˆ4\nËSI='ãœZ˜à™0Ã!á<uşb×škÈ`&l¼ˆQQ_€æÂpïSlÎ*­¬áš©2>XnNÂ¢³W\$§Ûİ¤¨Ì®NOe‚°Ñt©®µ5gÔõÆfãp°@2YĞŠĞdÀ";break;case"ko":$g="ìE©©dHÚ•L@¥’ØŠZºÑh‡Rå?	EÃ30Ø´D¨Äc±:¼“!#Ét+­Bœu¤Ódª‚<ˆLJĞĞøŒN\$¤H¤’iBvrìZÌˆ2Xê\\,S™\n…%“É–‘å\nÑØVAá*zc±*ŠD‘ú°0Œ†cA¨Øn8È¡´R`ìM¤iëóµXZ:×	JÔêÓ>€Ğ]¨åÃ±N‘¿ —µô,Š	v%çqU°Y7Dƒ	ØÊ 7Ä‘¤ìi6LæS˜€é²:œ†¦¼èh4ïN†æ‚ìP +ê[ÿG§bu,æİ”#±õ¦“qŸ«ÒO){¡şM%K¤#Ëd£©`€Ì«z	Ëú[*KŒÉXvEJôLd£ ÄÉ*é„\n`¾©J<A@p*Ä€?DY8v\"¦9ªê#@N±%ypÄCµ²0T«ï“¡Á‡i0J¯äAW¯ğóìBGYXÊ“ÄƒC\0«L´ˆuˆÊ“daÚ§ ÑØ	,RÌxu•EJ\\N¯ï‰ÖJ‡iXFP,j­e4\\‡[îu–DDt\\H©yÔ[²¤ìù'Qk”	ØN‰rgGOôøƒ•³Rö”äbbRBHÈÈö–dPvÊ`PòŞMˆ!hHÕÁ¬¶Y:D\"•EBbP:¤©ÖP¬>J—²\n‚/ä!@vs!ÖTÔEäŠY±\$VvCaRËùe]ÊbF¬ZG]©–”èKOÙöŒ-s1\$\\Ò2\nDL;«=!\"e±#é¶<áÈº£hZ2’)X+STØ6ƒ•’˜R|ı@,Îé6AB ŞÙ\r£Ü<„¨Ü9£ÆŞc0ê6`Ş3¼ƒ˜XßY`Â3Œ/ A£]a\0Úò®(P9….{	0gY ™ˆb˜¤# Ä5–@–sÚ€¡OmÎA+ÅPEÃ°üB Ò+‘d‡aÊ°ZUlC%L7¶!Qí»o	É×Le±=ĞóÛÒ[şÛÁ(\"hÂ9¸£“gËc¸Ş9Sã(ğ8\r#Ê2lAàÂÕôÃ0z\r è8Ax^;÷pÂ2icpÊ9ÜøÎŒ£wˆ<8¹xÒ7øÁ|0MØé×‹înT5„Ağ’6\rÈÛâà^0‡Ñ”2¸ã}>ßéCÖ×#£gßå=ğÜ:2Pt!	BD‹Í0P	A óÒAT'Ø²¥Ø.P@!(\"âÈG‹<\0F%}\n¦ªÕÜyd\n	^’bs¡&e ¥.&æLaY8b”^â@vEá^dõGá©|A™¸<å\0PP	áL*Ö&ÅS\\=¢µŠÂ¶•Åé¥219Š*4ÖSJyQˆxRÔP:…ŠAO™»\nDn»Ëêqˆ®M·šsR*e¯t7»°@êÃià€)…˜1¸5æİÕ„`©RŸ\r/qÏ¿'ã\"o\r €9»ó\\ğÒ•L(Yl¡@'!Ô^ÊQK!cì,HËĞî-/b¨M%4­ìÍÉR½!éA]qWË\r0Cc!°†0ØCk2?‚\0ìC`u8Ì¡õÌË‰AÒ)¥W0ğ\rÀ€*…@ŒAÀ x¡nY„§È‰•ÇÜè-q2c&¦0Æ Å*&ö²–` äØvƒ@QˆM›³}2Ÿ¡P´p‘C,f8Jâ°ƒQã/GPY^,‰SÁa\0áÕ¸L¡òjeƒkŸ5çå©â²ºglYpxC)¹gˆ®aj~Ò+h^¡NÀÉúG‘\nq>/\"­U½N,Ï+z‚®é)•2à";break;case"lt":$g="T4šÎFHü%ÌÂ˜(œe8NÇ“Y¼@ÄWšÌ¦Ã¡¤@f‚\râàQ4Âk9šM¦aÔçÅŒ‡“!¦^-	Nd)!Ba—›Œ¦S9êlt:›ÍF €0Œ†cA¨Øn8‚©Ui0‚ç#IœÒn–P!ÌD¼@l2›‘³Kg\$)L†=&:\nb+ uÃÍül·F0j´²o:ˆ\r#(€İ8YÆ›œË/:E§İÌ@t4M´æÂHI®Ì'S9¾ÿ°Pì¶›hñ¤å§b&NqÑÊõ|‰J˜ˆPQO’n3‚·­¯}Wâğ±ãY¤éË,—#H(—,1XIÛ3&òì7÷tÙ»,AuPˆËdtÜº–iÈæ§ézˆ£8jJ–’\nÃäĞ´#RìÓ(‹Ê)h\"¼°<¢ Â:/»~6 Ê*©D@†ˆƒ°Ê5±Î›<+8×!¢8Ê7±ŠÈ¥¹®[‚KÊö5´+\"\\A°{l¥-BœH8D)|7¦¨h ²%#Pêè/â‚€ĞÉsõ.\r2ó •-OXê¥¥ìPÂ®-A(È=.ò€ÎÓÂ3 “äï<‹°<³àS.ˆZtxjéªâ*¿³c˜ê9H¨Ò¿<¢bU=!¢°Ê€iZ òˆ£`\\ıNeV‡) P‚¹1nù.KcKÀÊéØ±Zs;ÄÄL6BícYkz	K –…¤Y¸qûfÒÌh½½4à\$Bhš\nb˜-7ˆò.…£hÚŒƒ%uVÆÎ È¤Ç¯úS‚˜Ê9EÒå÷.Ëã:ş*\rè²V7!¿Mc>9ŒÃ¨Ø·ë0Ü9…8åŠ¹;î7Z£jÎ:®a@æ¤ˆzæ›,ô^!ŠbŒÓ¾+ŠYˆCÜ™¾LªSi¸ƒ2Æ6é}ÿ.-RößÃ0{–’	F)V—Ãøc ş²£r’†(ã.¡¹¬üÓ	¢6hÖ<ÕM=6ZóˆŒMXv‡¶ËºˆA@\rƒJ•6%óÈÎ¶%5ƒ±i/º¸Ë6cRF’Ìx=h9cºÇ;Œ£Ààß/U˜y0Ì„C@è:Ğ^ı¨\\0Œ™r„9ËÎ®>\0ğ¹ä|0Ü„MXäÏ`¾ÖèÃXD	#k÷µ.# xŒ!ôG­D± |	;*ï?X>'ìæ¬DBı¿£Oµ­±\n„>Œ¿\$üî1,x„Â€H\nèş	sü€\0('LĞ‡#NJSZgg\rô•&\0\\CËl\nÆøÂ,¢VJa-%åÀ4†D¬XjA!°8D&wQI6qÎâ£c¼eIÑ\$\nh½›@@xS\n€©°˜u%pœ79Š\\azÂ\rd` ãÒ­	©5‰°ÜPÜ‹+^ a4¸&Ì·C£t>Ğäó\"Ú3?a½ÜETğYb@Q	„|ÎS6ˆB0T€m;’ àXÃ¡÷‘!˜9#ÂÁØI\$0)—Ÿ…ø\\›ü“V¥Z¢&L›dè†PÖ¦Ñ\\:|Ò|—§Ôä	LRyjJã³&ÃJĞ–p=eKc¸‚­\r€¬1¸PÆÁ\0oeˆ„;ÀêeMàK¤31S¼Ocëà%Ò\$1>vXB F àÇ4Î\$—Òˆì¢8SØHdxŒNâ:´'Y\\BsÔ¢jHÃGˆ…ªãˆ\\‘q„–iÍPÅñl\rPTÓÌĞä†R(y+ˆpbö_OpN,e°½²ãŠqéÄ8Ä®Ó‚å©ír4xä¶ eŠLm`ä¦ˆs”ğ†„ÈéF­@ãDD>XgÈ¡OuE@Õ¦dáÆLy+v\\s_A,‘6cÜID‡Aå©êÖ¥nT¨¡Räz'†ä'Bœa”Ç³B•üšN‡”%ËÂ<GCË";break;case"nl":$g="W2™N‚¨€ÑŒ¦³)È~\n‹†faÌO7Mæs)°Òj5ˆFS™ĞÂn2†X!ÀØo0™¦áp(ša<M§Sl¨Şe2³tŠI&”Ìç#y¼é+Nb)Ì…5!Qäò“q¦;å9¬Ô`1ÆƒQ°Üp9 &pQ¼äi3šMĞ`(¢É¤fË”ĞY;ÃM`¢¤şÃ@™ß°¹ªÈ\n,›à¦ƒ	ÚXn7ˆs±¦å©4'S’‡,:*R£	Šå5'œt)<_u¼¢ÌÄã”ÈåFÄœ¡†àQO;zºnwf8°A®0œÆñ—æ¡§xÿ\"Tê_oæ#‘ÔÓ‹õû}âOÃ7›<!”ğ¢jğæ*ƒš°­%\n2Jê c’2@Ì“Ø÷!ƒ’”2¦C2ô4˜eZşƒÈà’2I3ÈˆŠxş°/+…¤¬:ô00p@,	š,' NKà2ãj»Œ P˜¤¬ˆŠ2\r-På	>P¨æíŒ#h+Œ#Ğ:êkŠ	#r^3¼:<5\" ÜHC`È	Êğê;ª)\\¬¥#ò•3ÂE=ÄƒÌHĞA j„BÒ~å®® Â¾Šk²W9ŠÌFåBÆ:@@P—Pˆ¡hÛ/¢³zŒ8ÎHá\rJÊñHRÆæOÃ-MT8hhô±&I¤ú”×U;L©¸•ınšÃ¨\$	Ğš&‡B˜¦ƒ%L6…¢ØÕoBë%Ê˜æŒ´úÈƒ¤)¡® *É³ÊÆ´58Ü< —(ê1Œi æ3£`A1¯C›­w_ƒÏ(«Ò¨”«Ğê•…˜RÜMhì˜3„¦)Éó–¢J:®:ŒË²v!¡\0Ş8+£,æšŞƒ¥ìá5\ràÎ2&·€ç\0¤4h,³P3Ğú°Â¬ésèêò£d!©|FšşhÏfÙÄå:bJ†~Ã&òK8:<ºâ¿£ÀáÃ@xî\rpÌ„RØè8Ax^;ñrcŠ¯c\\»ázgÉ?ñĞÒ±áh9#ƒ§\0/¶É8ÖÂHÚ—²Ü:xÂ@ºR4\réKU¥(dêÑ!·Òf:&«û„ÿ@\nó%¦ÍËÂX(	†ëâé)ç-=ã¨ã…\n®6‹ã¾J9ƒ£nƒ Ï\\©ªnœ§iìÕW³s„‘ÁÏ”¡½¢7¦¢€)Šk\\IšÙ*%…,¦¿5hË“?ĞïÂIKÿ;¼ŠGìÈáUŒ±! ÎËJ^&¦d‚†3îk	y1p1€@ÂˆLh¹0Òw0TyÅl¨ºu,îÃ1L'«œ9BjS²½G5fˆ˜\"Jj#À’ÄtíSã'íš§äšêaY'ŠmÅà,4êêJœR±Qà\0 †»ƒ`+Í›ŸÓ„Ş¹üH'\\2¨rQ—Æ˜–²JQŠ‰E\n¡P#Ğp‹ âLMqt”™P@rIIb¾\"V‡Átf2±İ´Ù7'dùÅc„h ‘òB`ˆì\\åÉu)‚líCHf*t35âf›Â‘„(‘£ä …#ã/D„LSæ£Ù2Ñàì¢YÓÊ0ÁA‡#2âƒJF&HºÉÆÒ‹±,‚DBJ‘ùDGÌ‰aDì|ÊF\nIŠÍ]©7„HPX	\rA»)eÖs0p ÒÙG³…Šµn)ô0§Ì(œ©Ìã”LÀ";break;case"no":$g="E9‡QÌÒk5™NCğP”\\33AAD³©¸ÜeAá\"a„ætŒÎ˜Òl‰¦\\Úu6ˆ’xéÒA%“ÇØkƒ‘ÈÊl9Æ!B)Ì…)#IÌ¦á–ZiÂ¨q£,¤@\nFC1 Ôl7AGCy´o9Læ“q„Ø\n\$›Œô¹‘„Å?6B¥%#)’Õ\nÌ³hÌZárºŒ&KĞ(‰6˜nW˜úmj4`éqƒ–e>¹ä¶\rKM7'Ğ*\\^ëw6^MÒ’a„Ï>mvò>Œät á4Â	õúç¸İO[¶¬ß½à0´È½Gy›`N-1¬B9{Åmi²Õ¼&½@€Âvœl±”İçH¥S\$Ñc/ß¾õ¡C ò80r`6° Â²zd4ŒŒèĞ8îúØa”ÍÀœÁƒ²ïã*ÊÁ­-Ê 9kãŒ…-ƒ;şñ!Khì7B‚<ÎPˆ˜ç·«dh(!LŠ.7:Cc¶Bpòâ1hhÈô)\0Éã¢şCPÂ\"ãHÁxH bÀ§nğĞ;-èÚÌ¨£´EÖÅ\rÈH\$2C#Ì¹O Ù¡hà7£àPŒÅB Ò›'ô\nú¼ŒñsÔÉÊmô(-HèJrxËMÅ*–2SòãM=‰Ğš&‡B˜¦zb-´ÕÉJÓ´•ArÜ<7#éğZ™hĞ-Ã9CÎ\\wJ„¬ä*\rãxA!Ih¨æ:Œcú9ŒÃ¨ØHö XÏÉm°Â¶0ª\$6­–°ÊaJR*ŒãÈØ¿.A\0†)ŠB57¡*`ZRò||‚cPÊÈ°hÈÏ‰6`Pª:HÔ¬ZCÍˆò„0iI†L\rc Z…¶áĞÃV9Îã¨É'\r6M”:V°Ø–aÏ0Îôc±ê,g-8İ(Õ)Z¢9PÑºÑQ 9öO„àÂ\r	ğÌ„CBl8Ax^;ísz\"ã\\´áz—»	ˆ4ãp^.£’æ:l‚øÄÏ!|\$£‚óHˆPxŒ!óÛ,Œc|ûsn.µlc¥R—T®+š™kĞ‚~ °ıSÜøsYe!Í\n@ õsè×\n(R¦ 6F.¥®z2«_·ş?i1j7ËC\"9[êR•©ézbÉ‹uÎ3'ã¤d¦\röhââº—£=Kì¤4ˆûH2X<€ÏÍ\r8†\$Åâ*¥€¿‡ÂşŒ`n]eà¡¿&XO]yti§Ø†¶úIƒ8u1Oa¾‡2üO™HiCÊ¤Ç‚\0Ödˆá&äˆ’Gì@B˜Q	€´“.wZ×Â0T\n5¸ÔèTaú1J™h&2ŒYt(aÌìS KÄA¤ öbÊ,Rh,é#âR•c84Î´9•>¨c	Ci±’3†„Ã`+\rg˜„4Ã†]‰~s¦Sº–~\r“/4ìÅ‘‡úB F2†tòØ\0g‹é<Å5‚3üVT¡•90ŠHK…Qòækàb4¦¤Ü7c\0Q|#°q¸€£Š_ÎYà<G¾Ë€ZlŸÙz¤;ÊÂ1Oä¥G!¦?˜\\ˆ1Ö6­Læ„V\n™’²n\$œ´àF	òß\r†'(ÜÓKHÒ¨–¨s~\\\$ù€\noÊ5÷úøM”Q¥Ø¼Kº¥Yª#	\0";break;case"pl":$g="C=D£)Ìèeb¦Ä)ÜÒe7ÁBQpÌÌ 9‚Šæs‘„İ…›\r&³¨€Äyb âù”Úob¯\$Gs(¸M0šÎg“i„Øn0ˆ!ÆSa®`›b!ä29)ÒV%9¦Å	®Y 4Á¥°I°€0Œ†cA¨Øn8‚X1”b2„£i¦<\n!GjÇC\rÀÙ6\"™'C©¨D7™8kÌä@r2ÑFFÌï6ÆÕ§éŞZÅB’³.Æj4ˆ æ­UöˆiŒ'\nÍÊév7v;=¨ƒSF7&ã®A¥<éØ‰ŞÒvwCù»İN¬ A¹g\rÈ(ªs:èD®\\×<˜¡ç#Ğ( r7œÏ\\±…xy¤Àô¦ã)V¹>Óä2½ˆA\n‚¦ª o³|­!êà*#‚û0j3<‘Œ Pœ:°#’=?Œ8Â¾7Á\0Æ=(È¨È Ãzh¼\r*\0åŠhz’ã(ßƒ’ì	ŠË„0,Ş9;ÉŒ3#ï8‘¥#{v6\rã;Œ9.[š0®®ZøÖh(Õ/	Ñ’È2C\"&2\$ÌXè„³€Å93¤í92£¸¾<éhÁpHPÁˆ)C¨ÖÅC8È=!ê0Ø¡¼âœ–Â0Ò*ê:H†7(ñØà7ÑéŒ§£HÙ,Pî1Ã±z{P6IIˆBÅr‹`+¥ÚDÃXšR)ó€ËV5p\\Ø¶=IÙVe\\šÚÍŒAY£k\$I²½¢@	¢ht)Š`PÈ\r¡p¶9^ƒº÷U\nbÑ#ËpÙ Ñp\"i&XÄ´Ã6Mì•¥£«ÜŒcB92£AƒFNˆÂ#æ*ãTõ\$62®jê.® èåÙøHÉ…ªã.98–<YâØÃ ãxî)œd~D–ä¶öR:¸Yjƒ—¦8b™â¶œË8Îyy¸Å èiY£FºBl'!ìàÂ‡’¨î)ÃZ b˜¤#Á\0§­8Û]¶0¿#4–6£`Âö!z ‡¦Ø.«¥u8Û`§üCĞŒèò‚‚ Á\0Ş1[c¯*ŒLÍHî\n@ ›\ns2ƒµò»Ş9`ÒÜºLğºêj_EåH„¿#D©n:S>¿ò„<õ¶>ê(#C 3¡Ğ:ƒ€t…ã¿´V9LIc8^8\rxÊ< ãt¹¡áZ9ã(éè‹ã7\ra|Ù\r#oÈKˆ‚œ€¼0ƒâ„±Ã˜nWl¡ù“èTá}Bä³¥Ò”A	aA‚„¥Û™“Ğz@‰\0¡Š.Õ‰ü.p~Â4é1õ%äÄ™—dÎ¯«…WJò¸}’w>b~5@\n\n€)f'éÌš3´&Nã·l•³6†ÔÉ{\$gLh© PÖ|[†eä“ÒÉ+GĞ8RşÑ9dè¹ £Ü[ÚÓDœ:0¦›Y«uA´­Ÿ'4“8™)Îğ¥0ør«QÈLÇBæ]H„\nˆ‡\0003”´GCy\rRi‡7ìã£\$|„ŒÔ…0¢A0„¹r8ß\nQ@tÉ¸S9‹F\nA‰Â\$à‹ê§E9õâ‚‘‘Isø—ÂR}OLAä›MÚ\\æªúL”5˜B|CÓV›“Bi2¡8 Üã:ÌĞ›H2Gã'M“M–É‰ğ´çÔí0Sö{†™òœ'Ù“O¤Ø!¤Ø\nÃYU#æ°èLµJ!à‰' p,äLÉpM‚Y‰jÄ‚U’FP[\rI'?%°¾æ„É%ĞU\nƒ‚m@füé,–d©¹Ô³éÄÓ Têk*†³_õ>gkb Ğ£-<*)ÿ©*5ÆHšU#ÍÂ†\":~ds…eğ¿	ì€Tf°Ü1¥i¢à9n£¦&ŸsXHŸÁ%9œÔÁ)/AOË+v”VE”êBC³„:ò4ŠÌy™¥¸+ÙÆP˜c­rˆ¦ó@“ÕŸM©æ¦™C,›Yê„eù- èÎ‘²D†0¢PˆfÊ­t¤êª\0 “RfYè>J8Å”&Híi¶Š²Kh™®pI4Æ¢ƒBm2~¬æ€Õ!P";break;case"pt":$g="T2›DŒÊr:OFø(J.™„0Q9†£7ˆj‘ÀŞs9°Õ§c)°@e7&‚2f4˜ÍSIÈŞ.&Ó	¸Ñ6°Ô'ƒI¶2d—ÌfsXÌl@%9§jTÒl 7Eã&Z!Î8†Ìh5\rÇQØÂz4›ÁFó‘¤Îi7M‘ZÔ»	&))„ç8&›Ì†™X\n\$›py­ò1~4× \"‘–ï^Î&ó¨€Ğa’V#'¬¨Ù2œÄHÉÔàd0ÂvfŒÎÏ¯œÎ²ÍÁÈÂâK\$ğSy¸éxáË`†\\[\rOZõƒ?£ÅåŞ2wYné6M”[Æ<“‹7ÏES<¡tµƒ®L@:§pÙ+ˆK\$a–­ŠÃJ¢d«##R„Ì3IÀ¨4£ÍÈ2¦pÒ¤6C‚JÚ¹ïZ¤8È±t6 èø\"7.›Lº P†0ÃiX!/\nê¹\nN ÊãŒ¯ˆÊóÇBc2Á\"‚+ÚE242¿ñ(Ó®ÊPÓ½.päÇ‰¨\né+¹H#&ŸF¢pŞ;#2>Ú!Ã @1(HÎS¢Š-ˆ7.A j„B‚l1²ûŒ8¸ce ƒ„`ŞÇ/bxå\r¯.4”6(H ºÎÀ¦’Œ£ãN½!jx4¯b\$† ¤«œ¹#r¹©JVãO	=^“%	Tp›Îó’0Ö%}cÁƒÏB@	¢ht)Š`PÈ2ãhÚ‹c\rÌ0‹²Ó_U9®SqCcÏ-ITPœ õ:‰¶)\n0œêz<¿ìê1 É\0Ì:¤Ô²îÉ˜å‚ZV`Ü/\n|å}¨HP9…0°Ş5¥\0†)ŠB60”¨OZíŒò¿+ Û†%‹‹T·EpÊœTéú„WÔp‚oŠ'ƒß©½FÙ2z\r©\"Ø°N“·Aš\rü­‚k£â(òZıM‰jPóÊŞw§	¬6ˆ°Ã˜îºY[\njêfâ43£0z\r è8Ax^;ñtq} árè3…éG*<@ÃV„Mğä3Èü¾1\r‰èÖÂHÚ85ùèèã}„`èŸÎM§j0ä˜Àèß)îÖœ\"Ì¸Ñ	À©F¾ŠËp	¯ÜÌ\n@¡¥ìÌ *JN¯BlXæCÉ Øœ=û[˜Œ5+.¼Ùl>0§‹†ç~{r‚¡¨¾|¨cYx\rP¡øW1‹DÀû¶sötkJ…@œ\0Â¢F)L9¥:_\rÈm˜\$ÈHY.7ÄğŸ“H@à‹> h	½µ·üsq0ê5ös/\0Q£4¦9‹›e,!˜b.À€)…˜~U‚TXÀ€#G®OS‘E{.øü“bxÉ r'	¹%•³ÖÑ™x\nŒ†Ú˜§Öc£Lk6…A•8N\n¡3a„3\$u–K¾yD>½£B8laŒõ©0@IÒ\na¼1ØT[”±-°é¤ğÂT±SŠ.Ôş»óÊÁ\0U\nƒ‚NšI‹\rÁ<'#:›ÈÌZ.’@,oM”º!AâÒœ†\\Óæ_‹­U¦P@NŒ#¥F\$Å†`ò·•IdŸF£\n©Z˜\n(ÓUö`ª•¤Œ*=a¸5ÆÙÈc¤Ôœ kÈƒ’È*P˜z5béyRäz8;€*€D‚%Á‚N&pÏFY/Í›L2CÇVkÓ‚§]d\$2#e,«+a—gº\0Ì3Œ\rŠ3+¹hƒ\r3Ì…\"“@ÂÍép“Cš“@/Áù2ğ";break;case"pt-br":$g="V7˜Øj¡ĞÊmÌ§(1èÂ?	EÃ30€æ\n'0Ôfñ\rR 8Îg6´ìe6¦ã±¤ÂrG%ç©¤ìoŠ†i„ÜhXjÁ¤Û2LSI´pá6šN†šLv>%9§\$\\Ön 7F£†Z)Î\r9†Ìh5\rÇQØÂz4›ÁFó‘¤Îi7M‘‹ªË„&)A„ç9\"™*RğQ\$Üs…šNXHŞÓfƒˆF[ı˜å\"œ–MçQ Ã'°S¯²ÓfÊs‚Ç§!†\r4gà¸½¬ä§‚»føæÎLªo7TÍÇY|«%Š7RA\\yi¸ÏÛäuL¢bû0Õ4à¢\$ ËŠÍ’rFùè(ªsÊ/‚6¿ö:³\0ê„\rëp² Ì¹†Z¶á°­«ªh@5(ló@œŠƒJBÜƒ(ÌÀ*‰@”7C˜ê¡¯«Ò2]\r¨ZDö7Ãœ C!Œ0ëLP¼BËB8Êú=ëìl&3ìR.ÈªKãíGëĞ¦•µÀPŠèÆ¬Ø˜7¯ãtF9'£rVƒ#z¿!4¯RôŒ\0Ä< ÀLá9N¸<ÏCrô¡xHĞAˆ(4ãë.I£š!a\0Ø€°@P9GL¤˜¨Í	†S¬NÛÜ1¯,6\"…©èÒÁ½ P‚‘®Šô ÌÃÄ_-¥¬¤îƒŒ5[ø7)RX—)!tí8×•[p3/‰å…\\©,x0Œöh\$	Ğš&‡B˜¦ƒ ^6¡x¶0İ»Q6µ# ê·¶ˆ6=Uä–©.UzÍŠƒz‚Ÿ0.:ŒhRF3©M'0ab\n9`6¥{10tâ¨ºh0P9…0ÀŞ5¥a\0†)ŠB3È–(cdBÂ\\ôWó&—¯-Šíº#+Œ0¤­ìäĞÄÈS\$Ş¸ÍÚøßÆLÂGÁ°ë`Û¾\rkU²v-E¥³« àÍG#¦ên˜ac¨ÊÀ3öo3ç@PšÇ É€àÇcºùdÛF2eäd44c0z\r è8Ax^;ñtsŒ!arø3…é_*<A#J„Nä3½ü¾1\r‰ğÖÂHÚ86¹Àèã}7hè N#¥ÿ<ƒ¤Ç2ÌéÊ2Î¬•óN‚1,@q”Ãs:cp(	‚-£!šëp+JT³B¬æÉ²Pœ¾S8ÓŒyå@Î°¶Rª)È¢ê:?¤:(J\"Œóíuhˆ§¦B¤ˆP8xhP!–¦Â‰€a@m±Ú Â˜T@¨Å«Ç4HàgF§e„©&'\r2”bk “®<o8Íòm\0xnCáE¾ã\nƒÀQª5µ1µ&A2Eø0¢â«<jä`¨õ‰òq(Íß#øiÈAæ\$áÈœ„øLii§Wë›SÕ£2l\$qf,|uQ6šr±Ù9æedF-‰\0C1ï„;•'ÌVtˆ‘KDœ„3ÔXceJ@‹ğÄháYvRmÈ—£\$†dÁj“'!)?Ä\0ïŒc'T*`Zc\ræHï”îhãìtX’½•Š±Íh4È‰f#RÚ< ZOâ@HœÑ'%&avªSªŒ‰ÙŒt­º]¾°ò¸(c4aÌ…3”‚cTûÒRœøb§OeA¸5c')«üœ¯°ñ\0A(‹ä(i…1t½\n1zKèäÀú&ÅËáã7¦*BL™ƒ2&s\"ó­„Æò9.\\nJÊŒƒDn¤Õ2Zo3DøÌYêí&Åq8Li¨9L´Ô‚~/Íb€";break;case"ro":$g="Ed&N†‘Àäe1šNcğP”\\33`¢qÔ@a6ÁN§HØ†®7Øˆ3‘ŒÂ 3`&“)Èêl‚™bRÓ´´\\\n#J“2ÉtÀÚa<c&!¶ ˆ§2|Üƒ“ÊerÑº,e œÎ’9¸°0Œ†cA¨Øn8‚Œæó`(Şr4™Í&ã\rµ†7FÔœÉ22N“*´Hên:†”Øe›‘L†œòF\n\$›rÓ.Y‹ğø˜şhÇp–šfå“|XĞašÕMğ[ØÓ3™Nx­™ÔáÁâ|Y‹7)İf¹àW\$ÙË=HÄ±Œßˆ¹zF\\.aæì.f?;ÑAôçb	üç›ïúL„Æå¹(W°Qp2§`Ş9¥DÚÃ¯Ë˜@:CjF:\rã\nÇ„\nÃÍ\r(\"–›§*šz/ãRN¬!JÙ›ŠƒHá ‹üƒJû.\r’B#“ºˆÛ­¯ ÒƒÄ	’L9#í\0E#‚ô¹Â@P¤2™Û:ã(Ş6Œ££PüÄ°\$Ê-ñ³\0™#m¼dÁL¢„\$¶<Ì¼Ë‰ƒxÏ	&C‚ZŸÃ+Ë®í3Q\"\rÍk.Œ\0ß%K MEQ’¨Ò-ĞBA j8BFÏràÃ¯îjŞï@ÒŒ:?£\$ÃÀ›„2¯ 7 ,\\*ÇÉC“®4¤Løˆ™\r\0¡?KÃªp'‰”v¨0`P¨¸Uğ\0‚”@lL¼¡!N•9´èT\"ƒ…ÀH‚‹Öël!I•Çrk{TI#¨Ú	@t&‰¡Ğ¦)C È\r£h\\-8hò.¹µ½æ\r’ö\"9&£€'h=¬7¶sàó³C¨Æ1·C˜Ì—„dì÷…—~F0ÎğTG¨Ê³aJn!ŠbŒŞ\rsğ@¡Ò16ápA)ÛöÍ¹Œ*u%\n¥lHÆĞäÙ@æä7CKÛ¦RğÊ1©b\$é%3ÊŞ72Œ…­¤eŒÜ	± ‘ğ8Hlcaû[ÒàåÃ8Ğ2QlB©¸š0«J áÈcºßD«âƒ„âN4 ã0z\r è8Ax^;õr‰œ¦ËxÎÏİ ñÀ¸^1P“r:tbûŒ0ÃXD	1û.1à^0‡ÊSw.ƒ@ßDÂ`Ã¢èìLõªO¬BnŠÂ¼Œ+ÛÏĞ\$ò7NÄÆ6î–à„Ñ_?qµ4ZHäÅÄÁ\0PRÙòfBˆ¹4£f[Èa\"ÎMa,—ÊpC9k%q4>OÊ	EÆ•r(7ÚKpiˆP¨®ã{Ús\rE¼0µt6‚iº!©–\0Â¤O'}í.€@µ×ƒjç´)\$úˆ2p(öAd\nA aK¨|ëâRĞd-@Á•Åt”Iªkà(ÖbL^Mó.(„]'¸¦Ba(l€€ÛpŒ\rÊ%¤*·ºJ>d›¨\\ŠÒHH”­£*ƒœÁ–D%äñl4ªÊI\"ñ!Ñ,Š3¥.L.ãŞKL[rdÄ†×®II&ª>.S8ºWZÜ‘²¸ÉË’R”LµƒÌı/ÀVÑˆc\rdÅú‡bê¹ÓÊÌ%Ñ±Êù|‡#˜m²4Æ´ròB F á\n’^ƒ97QáÈÒÇÄ~ªÌésµ4yŞşâKã\"Ä`ÃfÖ¾8S&°y`¦èÓĞÄ™RšÉRJLîEJ¦|—i2ü”É¬±%Iékd^#FXÚV\r¤!W/%‚Ä\$c]“tÜ\\‹ \n%èøğ'RˆxÏÊQ2¹\"Á-	Z*:`Ô™lP‰ áê˜\"^Äh	ÜT,¹>œÀŠŞÕY˜è™PÀ§úi]é1ëXÆPuRK;§œéU";break;case"ru":$g="ĞI4QbŠ\r ²h-Z(KA{‚„¢á™˜@s4°˜\$hĞX4móEÑFyAg‚ÊÚ†Š\nQBKW2)RöA@Âapz\0]NKWRi›Ay-]Ê!Ğ&‚æ	­èp¤D6}EÕjòÙe>€œN¤Sñh€Js!QÚ\n*T’]\$´Ègr5„ö9&‚´Q4):\n1… ¨â\0PÀb2£a¸às_àp²HÌÒN…»GìXÊJT±²Gù\r~ÑBß±0L4‡Q#š!®Jn±¡KÃM!‹ê\"Âk(Òà6´I¤ÙìæRüÎ˜µªÑË&ó¨€Ğa;Dãx€àr4&Ã)œÊs<§SÂtñ\rŸĞÂ1=‹‘B’6\nZë9ÈÌ’°2&éšTÌ¸mZì‘–Ğ‚R­ÂÉ€ëB¨D\\! P¦ğ\r#pÏ@j±¹°‰p•NRZ„F)J„Á–°Rj¢¨PI W¥j¡tä¬%Œã¹æ0¦:®\"¢FH¨1s–©SˆÑ/\nin‚±úhØÉi:ºá+Êj¬·®E\"Ô]£¦„3,°ÂGñªÄ®K¤HÌ f„¢‘*Ic‰K[°\\£%;¬ ¤eò2J\$úû	0èc°^\$||›B¥ÒgI¨\"hCªk\n­1PQcäšâ,Î:šSÆ„ê³ÍıFh7Ã}¤¤2L)Ôì'Ğ«µÃ;\nrOÒ°¬¦Ò®Ò»‚Œ“Ñ²Cg¥(}³:u+qºtÌç„£#N& Mãy¯Tµíy\rEòÃPàPò÷O ¡pHáAŠ3jTÊdƒ¥J‰~®ÅâUZ³qíu‡CÒ²6¦©îmIEÆÑÄJ€*’R±&#%mßÖË´¢hôµ¸š£\$Ö2‚áêH¥ÓWrFì5Ëèœ¯T!‡À”†KX*¥#-Gğ¤o›§Åòİ~WŒ¨§—Áphk+·0Úõ¿°/½ÜÏ*JyaµmšÔº’î0r¥Áûí²¨4Úëª¹å*@Ñ¦N\nI9Ê@e\n2–rœ§ÂÚîYôbì‘~ÉpHØ:Ur†„,ı=µQŠƒ{Ê6Œ#pò£pæ:ŒcŞ9ŒÃ¨Ø\rƒxÏacâ9wcÎ0Å!«{±Hêü˜R¹:0¶XÍÇL§T¬B¦)Í¢íQirUnğ1Ëh-6-’A¥HQ4D‰c+%È€34»Šã…YgQ\"BAÂåoAı \$ğPQ\"3BÉI9*“NkÎr4WÌYÇ4Â€™¿%D}ñ§“¬¸Î¹€ƒª	ÑtóŠ™C-…r¶‹#³ƒBÊ	#e6AJ8M!Ìü#ÍÃ˜w\ráÉyPğHr¡‘ùÀÂw¢Ğf ˆ4@èĞ/áŞ6àÂÈn¡ÈE0ÎÃ(nàü;àÒãĞ\">!„9àéÂú\0w!¬à’Cì\r±ä:À^Añn>Lıõä|¸\rgˆ4‡CÍİÄr\rÁÑğ\$`:'È‘F£TGÉ)…&'V#´…¡ó¤lI”hË“,ÖR^hZ42‰\rS‚,Ø\0P[Şúé;\rÈæ(D©’Ë(™*\ró¨cŠù¦J\$‚+¸ã-bP\\”¤¹U’£öÄçĞñLDêo8STK	ñÆU\r0¦ÎE:x0ÈŠµSA¥á¯6+º(·ä4DZ'YˆÄ±& ±¸˜ªùZ/4¤¸JìA—é(EM @xS\n€µ òÀl(»¤t‰ü9øMG“9b.Ô²—SV›5Jl&.ÀµªuÃON¬í%ªÕPªTÉÊ\$%éÙ™ˆbšq\núÙ¡© ì!ù @©\0\n;gt1»—y\$C|o|1Î˜Q	€€3³Äz¢øF\nB¹†åäd„S”Ò–¾ ŞH¼s<1ĞŒ‰rZâ	¹17Î€—+,u}+ŸÎ\r4·»+e×yoƒí¸Ÿ˜s6Üìá .M´µ©tHYSM/­Ø–Zğ#å´vŞŸ øL@íå¨W¢âà·éïq5ÆW&ß8ÁrQÂ¬\r€®”ÕE,àY* \nV£¢#s<Î¡@‰…\r	•Ñ™8£„jı(C¬LŠRà@B F àGÇ'‘Hg.K §³¶BpaLÑ -Œ 3˜l›^¢„Ã\"[¹Ê…05¾a¬È°òpËË*ZñP¡ÈêrPhj4s†Û¾ãmSFˆ† @(&à€ÌLÁx&)(°á#¬#ˆÊÁP‚? ”ÑpâÃÅ¨ã\$%‘n(&8)…€^\$@“J\$œ-¢ÃÂM2ÛA‚\\\";\n’{YA\0Âizâß2P0…Ü(T|ëUáa’eË74JuN€ ™\\C&	ÑÚBPÅ3Ä}ñÅ’éP’÷…t¾ò2ì1c;jTöJ‰ƒ)ìgà24×X\\fƒA›²ƒ‰ÄÇsûª1‚.—\"–c‹C2]1şÌ\$\nåzR²Û\$Ë¨E’q\"";break;case"sk":$g="N0›ÏFPü%ÌÂ˜(¦Ã]ç(a„@n2œ\ræC	ÈÒl7ÅÌ&ƒ‘…Š¥‰¦Á¤ÚÃP›\rÑhÑØŞl2›¦±•ˆ¾5›ÎrxdB\$r:ˆ\rFQ\0”æB”Ãâ18¹”Ë-9´¹H€0Œ†cA¨Øn8‚)èÉDÍ&sLêb\nb¯M&}0èa1gæ³Ì¤«k02pQZ@Å_bÔ·‹Õò0 _0’’É¾’hÄÓ\rÒY§83™Nb¤„êp/ÆƒN®şbœa±ùaWw’M\ræ¹+o;I”³ÁCv˜ÍìMÔÎ\nßò±ÛDb#Ì&Æ*…†­¦0•ì<šñ§“—P9P¼æÙçĞÊ96JPÊ·©#Ğ@ Ã4Œ£Zš9ª*2¨«¶ªÒ¸ì2;’Ù'ã˜Öa•-`ò8 QˆF<ã˜Ø0B\"`­?ˆ³Œ0¡¢Ê“½ƒÊKª`9.œÆã(Ş6Œ££2ô I˜Ûˆ£ ÒÖ@P ÏC%l6ŸÀPÕ\$²<4\r‰€æàq`¨993,BÒÌ“2sBs£MØ×£ @1 ƒ >ÏôóAÏÔ\0ÔÖÀPòÕMÁpHRÁ‹æ4'ëã”\rc\$7§éëä-\ròT)1‚b])BÖ1¯o˜áÓâ(Zõ£àP2(PdWK¯Ä\$“Î\r-~¡El`„›„İ 0§Eê›?µØÂ…ÀM¦6\r6­[¶[µàØÂÜIºCk]Ë¥uİ¶ú@;%-’J=KÂ@t&‰¡Ğ¦)C \\6…ÂØå‡Bím\\(ƒ\$_\r’Rÿ§²­8”3;*\réÖ7!\0ê7c¨Çc˜Ì:@ºecX9e#ÏoÁëu«¨êÙ˜R”‰ÈÍ‡lµrb˜¤#ÁòÜÌ‰¹¤~M’”ãó.C9©‹XÊ1³\"B;Ó22\rcª¢ÕLã~ƒ·Iruì3:,1*\"j›§1÷˜;óúµ¼¯ÃNR²¦M;«ò9¿{&Ì0¥)_6Š æ;¢vàğ8\r#”¬‡ˆ²H2ŒÁèD4ƒ àáxïá…ËæŠŒAr&3…éÏš<6Yg\"7áXµ#§t/·ÀÖÂHÚ8'èã}„@Ğê?hÂ5©’êÿäéÈè”¯+Úúfå<îÈ7'@œƒ \\åh880@vÌ±L@Äh27cºEê÷?!ê\nØyÁ\0()Í-:´àÂ s™F]ZÂ GºãsÈ4üœg¶Y-%äÅ”7UH#RL>&Äá{ˆ|™EkYG@^TZÏĞ­?…8”Ÿ…–bÅ	<Kˆ}…\0Â¤\nbñ)ÀT¦S°¡/çœ&É\"qL}å½T””‹˜u8±\0005@§bƒC¢e1PÒ’ÖÃ*|¼¾ş\\Á\0S\n!0G‚pOØ ÁP(ÜŸ‰sv\nQ†cò›?ñUyöŸÉ¹İ'¬—iXœ<±8!¬­0Ò ¼¶JÒ´ ,Y<7n4P’•NÑ‘A³!y‡gÈC±ˆ¤¤!¤ Ø\nÃZä\rp\0“8yÎ1AgRğ‰®£¤zp&H”„b>S,£n\r	 …P¨h8]ˆ\$bS¥	Qau‡¢Ú“—\nã\\´%\0LÔ¡(p¡l¡…'ÑäĞŸ\n¢Ğf#QŠGA)\n†\0Á’çHÄ#¤}¹¢6(dÂmÈ–`“^\\´¤šòJb»²l¤›%Hc™£Œ¤S¶€HÚ{@Õê’r¢’‰€nOe©h 5²‚dŒJA¸ëÖ™Hœh„éñ?7s†¢Ãş0•á»”“*Ú‰ˆ©œ66N²€(%’Fc+¯¡@)ñJ%6§Hãbç0ÛÒÔ>(N\n¥fÁ¢À¥^‘)‡¨ç\0;T’P@";break;case"sl":$g="S:D‘–ib#L&ãHü%ÌÂ˜(6›à¦Ñ¸Âl7±WÆ“¡¤@d0\rğY”]0šÆXI¨Â ™›\r&³yÌé'”ÊÌ²Ñª%9¥äJ²nnÌSé‰†^ #!˜Ğj6 ¨!„ôn7‚£F“9¦<l‹I†”Ù/*ÁL†QZ¨v¾¤Çc”øÒc—–MçQ Ã3›àg#N\0Øe3™Nb	P€êp”@s†ƒNnæbËËÊfƒ”.ù«ÖÃèé†Pl5MBÖz67Q ¢>Ügâk5Û3tâÿr¡ÏD“Ñ‹(ÅPß	FSÔìU8F®—ÂÊzi6‹3ŞiŠI2Ôósy’Oõ”ÏÂ\nE.š¡¾Ššæ›/bè†;Zä4áŠP ,°Â)ƒ ê6ˆHÂŠ°Nè!-Ãä†Bj\n‘D‚8Ê7£(è9!1 ¦î#Ãjø¼Œª0ì¡ƒ[¿PAB6qhi\0ò)³\0Š P¨ÖHó'&±ğ˜œ7¿h Ê2E£¢ûIˆè„³\$Ì0ÍPÔ’Í¡Ë7Ë€PòÍK@ÁpHOÁ‹¦ì!+àÖ£Iâtâ#I,¨	BI	ˆ‘Ê£:n¨ÊÊB(Z6Œ#Jà'Œ€P´Û±Ü–Ê<#r[%¤%pò'£b¢¨ï°ËOÔ+¸(V¨Znª?•ÕyQ*Õı‚Ùl”ÒWuD4…ÖT’×\rÅ‹hXé\0ì—I@Ô	@t&‰¡Ğ¦)C \\6…ÂØåyBí2º²ˆğ:Uãd^âEã,PïT’rL9Ê\" ŞÉTpòÏ\rÃ˜ê1ŒlĞæ3£`@-¸‹ÕáãæÚ6–|l7¨P9…)z.œÉÏ‹87¥®h†)ŠB0\\XÅfÑÈĞÛŒÄA°øUÍhè—É’rn:c†P£Úcë7–rŒ<S’H“EƒxÎ7¡/Š¬âRÖÓÂ–VÙÛÊó£/U[.-„¯ƒ )x›\r #’\rcº5]jõ‡‰»X2ŒÁèD4ƒ àáxïË…Í¶OM…ÈĞÎ¾=\0ğ€â#HŞ7á93#§/µXÖÂHÚ82ñhÜ:xÂ?ŒÜÂ4>¹˜AP(‰\"Má¯— ­èÉ}¿H²¥™x¯È‚\$¶Ï¦Ğ¿ZÎx\$\n\0P¤(êM+Ã{p7åÕJí'*›ŠåÉŠfš NÄ\"¨Œ“Ó}¦àø†•²x`#j ¬ ‘àÏ0s=½¹%ÂhB“yGm0‚“’vdÑùKˆ(ğ¦ØZa¡¨ì&gú(_ù _O‚‘òLx_Ü4Dxç¡Ä@QŠ1[™ò@m7=Áœ0¢\0fTDÀpŒ)>Ç ö÷”1aÈ™‡(8—Ó\nÚ\r'TÊ2Ó.mDôú•(£‚a)h;øîj’óº(Ç4£-´½ZX	\nrøÈ5†\\ä1zL+&E‘¹H¢Î>Ò0­I#[2gÉÄ\\—	xCEá°†²tÍ©8/E Ÿ> êoÔ¹.A)¼v OË©ÌT*`Z€ngÔã—‡ÛR´¤>ÆÃDEªfx¾“gÍBJäôØ\$3iú¬Õ·7Œ9.3Šh@eµ7L,ß~/T1	Ir.…Ù(„Ù˜ƒÉd6ÄÅ²Ô¢‹°aœ¨9  -Òú7H¼ß)iB¾‰˜z1ä\nI[…4F/ËBJj‘yTÆØà¡0˜Í±ÇRÀû’\nPšc–SU6O	ªSŒèbµx˜pÅXÑ­Ld¹¦\$feÃT¡,ÅujœHx\$¨J\rÏÉ<.¬º«`Ğ”§Ú¶/µ1œI@‚Ã€";break;case"sr":$g="ĞJ4‚í ¸4P-Ak	@ÁÚ6Š\r¢€h/`ãğP”\\33`¦‚†h¦¡ĞE¤¢¾†Cš©\\fÑLJâ°¦‚şe_¤‰ÙDåeh¦àRÆ‚ù ·hQæ	™”jQŸÍĞñ*µ1a1˜CV³9Ôæ%9¨P	u6ccšUãPùíº/œAèBÀPÀb2£a¸às\$_ÅàTù²úI0Œ.\"uÌZîH‘™-á0ÕƒAcYXZç5åV\$Q´4«YŒiq—ÌÂc9m:¡MçQ Âv2ˆ\rÆñÀäi;M†S9”æ :q§!„éÁ:\r<ó¡„ÅËµÉ«èx­b¾˜’xš>Dšq„M«÷|];Ù´RT‰RÔ)·ãHÜ3½)CØ÷‚öµmjˆ\$í¢¥?ÆƒFÏ1EÁ¢D4æ„8±ª‘t’%L‚nú5æ8¦¤ì‘x‚&‘45-èJÌh%¬éz‚)Å¢«!I‹:Û¬ˆĞµ *úğ±H¨\"Öh\"|˜>‰‚r\\-q,25ÏZÈû¡¬”¦¬E\$‹+\$’JòÅğz¢Å,mZHQ&EÔ‚A6”€Œ#LtU8²’i’RÚrX\$ŠTf·µƒô‰6ï\\H·22â´²ÏƒT‡Q±dB›.)!?E>´ Q1O;å)UT¢6Ê\\ïTÔ¡(È‚3ï:×Uâ‹!XÛ=a¥ï2I¤‹˜¡pHÚAŠ×S¿4J0Î–uS>É(%º–Â¤ı0¤?o=	V¦ĞÑ\rU	™£wÃTZI³¬ûXÈ¤„ª\nJKq!\$„ôp¡¥Š€¨ÔĞÊN§D56”*}‚º²*â‚,eŞŒCqªòºJiâ\r% Au‹€ã/jhºc¸şK¬H‚+–dËik•bù))işedK6q…-ª3¥ \$	Ğš&‡B˜¦ƒ \\6¡p¶<ìÈºÑ1—ÊÈå‘ÂÛ—C`è9@·Ú±}à±ÂóYQ‚ Şâ\r£Ü<„¨Ü9£Æçc0ê6`Ş3ÀC˜Xè\\\0Â3Œ0AÍX#l:ºá@æ­j\"Ç\"PR„!ŠbE…¦?l.ĞÕ\rf¸Ã¬S¦‰	s—ˆªÖQ§‰óY+½îó-q\\M”.”<XŠ\"ÔrbøÌe¢/\rŞD¨ iãXˆŞ¨r×tûŸ\n#ñ¦ô\\lšÑòbi“òiíc2d_^Ó>÷ŠšC™×G\00îÃ’»¡à8äZĞ „ŞÀğÌAhĞ8 ^Ã¼!Á„29àÜC.œ†PİCÁ×pa¤7ÂğDtr9¡Òó¾ßƒX\"Á\$6‡–apt€¼0ƒà@ZH;!½]¢CYÁ\r!ĞâÂ†û	Ãpt-faÄz[Lê¥ò¡\$tÃi{DaA#¢n!A\0P	B36¦QZ\n]hÍ©*&³ÚO‘Ó¥&N¡	“Sjc\n’Zê\0Ò•ô>F_yt’«Éò)ó:Ar¼Lç¾BIÜU]€ªó‘iªAmÌ¤¬‚V‘Øi³nrÄš€ Â˜TQ ™±÷œ«Q¬~BT”“wröf ºSÄì\"ÄŸ-Uó¹J\0–§Ôîì\np½wÄIêL…è‹™LCRé;&çÃ™B7Fğ1·çƒ|\$P1Î˜Q	€€3£‚r` F\n‘ñ¿+°Ó`D\\‹t9ğÚH¡AÀ…'¥!†6ÈÔñP)lˆÇcpIhéG£òÉCøi©8¡¥)(R	JRBX*İYR²j˜Öé0?r¥”²ºyG‰Ñ{Îê ©:ˆÎê1ô§¨>›TİPÌiBm¼6²É5	š?h3n]MÒìCûA¥ª~T¼ ¨4Q°(´\0U\nƒ€AƒT@A+¹¹&ešOP%UXjÊ­ªU‰&N¤ùXÓdL¤y·±–ÅYDû\"¤ÓÓfó(‰>Ü“‰›1kè‚‘Plf&<º´Õ†õU\0Ğ`Õ™*!ÚÖj×j—FJÜøØ¡ohß!­„fÑ«RéY,Á¸‡…5­³äb©6“5F\rˆVİÂ©3¢ñHŞ\ngxßy0?¤R;c¬ÅF±âÂù]j£š†²è€ò‹´„Cøe9aŒë†DÒyIôÔ™¡Jf jáO—%!mµ5c;(eè.Õ6f:bäªsµf€’\nì²®ôÜª“¸_€";break;case"ta":$g="àW* øiÀ¯FÁ\\Hd_†«•Ğô+ÁBQpÌÌ 9‚¢Ğt\\U„«¤êô@‚W¡à(<É\\±”@1	| @(:œ\r†ó	S.WA•èhtå]†R&Êùœñ\\µÌéÓI`ºD®JÉ\$Ôé:º®TÏ X’³`«*ªÉúrj1k€,êÕ…z@%9«Ò5|–Udƒß jä¦¸ˆ¯CˆÈf4†ãÍ~ùL›âg²Éù”Úp:E5ûe&­Ö@.•î¬£ƒËqu­¢»ƒW[•è¬\"¿+@ñm´î\0µ«,-ô­Ò»[Ü×‹&ó¨€Ğa;Dãx€àr4&Ã)œÊs<´!„éâ:\r?¡„Äö8\nRl‰¬Êü¬Î[zR.ì<›ªË\nú¤8N\"ÀÑ0íêä†AN¬*ÚÃ…q`½Ã	\no\0Ò7ğ2k,îSD)Y¤,«:Ò„)\rkfä¸.b¬á:®C• ÁlJ¾ä”ÂNr\$ƒÂÅ¢¯‘)2¬ª0©\n¶Ëq\$&‚ í¹±*A\$€:S®·ºPz±Çik\0Ò¸Ü9#xÜ£ ÊU-¬P¼	J8“\r,suY©ËÔBæ¸Ú\"¨\"+I\\Š•Ô²#6Æî|\"Ü¢Êµ(„+är\0Ü7¨¼CUÄğRl·,ÊA\\«'\rí{E­H_*Ñ4èØ©ğP)DXÕÒ\$B\0Tº2º&4\ršR¾BÕ\$Ï.k{¡Îk=8ŞFá@2ãhËfµN=ÂŞ®}Îß%\nü?¯´ŠR²Ô¤E|ËQ\rïO`6¬x\n£˜Ê9Z„BOÑS#z¥BÍ…¯JÉd—8*ÒdgdD0%AYŠD™ c¶’ŸŠÊue# W4AM²!Aâr¸J2GA]m9ş‚–6JtTÖwÈò÷O ¡xHêÁõaÇõj\0L©Ë\r>¦Î‘.àäˆŒM Áó‰pD1JÄ/±r–‡5û;„›[Ó|Ü¥LÛ<	)Ö¤BO.»ÎdW5±ŞuºHõHãÊ“d1Z+éµa—gr6\$ˆóÂÑs²VZ|*­ÄbüUKÆu7ì3®7šSŠRìH]¢èGFŞğÈX”®Ñ¦tÒ,‹›ŞŠ·‚à&İ+†€c¹¤”\$	Ğš&‡B˜¦ƒ ^6¡x¶<ıƒÈ»}B-·ŒÜÂ–ú¾1JLÊ¦ÕƒešÜˆ´*ÍX2~ØyábyıªŞ—	²¿AP7PÚCpyÕ=‡PÆÏxsÁÔ6†ÑXs‡Ä9A ÂÃ\n+É£ÔVO¸(`¤¯0¦‚1H6fD<‡bëÜè+M\$\\\nrHg1ú4œ+•ƒ·lÈñÑ8åüÁH‹ø4b4àòtS‰Â‡m(!P&r‘ röXq¥sFÈYÕé)Wè‹w¤°M4Tj(©7„C\\ü_g„EÜ2“°âËIvJ1»üˆQÛ¯lJ€šDÅÆDY«ddğG õ´ˆ%ºWD+É‡İ{+{\r	{Æ&c\0PM!Ìû‡#Í.Ã˜w\ráÉ PğHr¡’'ƒÀÂw¦Pf ˆ4@èĞ/áŞnâ‹\rƒsÓ3‚ğÊ§2yœéñ?ğD|Cr=ÁÒi…óÿX\"Á\$ÓÅÜƒ <á„óà»ÈohÈApÖxƒHt<Ì>ÎS‚âM ¢c' ænÅrkwâ5@h”¾\r \n\n (‰Ûóù\\®Y9!†P^VQ€¤§\\Ş›õÜ`|v-6™È´Ù\0Û\nªX4ğÇ“bïÔ\\SPõ%¼ùÒi­”2&£J÷ZTL\"r8¸H¸+•tX)Æâ©ÀSI‰ÓÎCNÚT ¨œ…\näM,YÀ¤”&Éz¼Âƒ„¸ujÑo¦ì¶¨šõ\$ÉAÀpo!œ¸ÔÜâcÁ@'…0©^\$;ò\"&6'¦B¹QÕJ1¤/Ël#¢xæú)×óà©™ìRnvµëĞPÓğf\r!œ:‡#ìŸCp “\$2†0èzC-%dÖ²=3	(vÎècƒl¡F3ÃÃL(„ÀAp` =S<#J[\0i4ó‰QÎ—i 3‰,9gdéez¹ci5'ÖG;]µ‰×õßú¬Òp{X9\rXª¨Dp;Ğvø(à3‡™\\íÈ¿'á\$û†ÚJğjPÂò)MI,6îKé^tâ»aGiˆe\\L5Å’¯6\\È¬²˜w…#¸üAUì»É¬÷LĞ«å‹°#“B¬ĞØ\nÃl\r!Œ5‚ü&xv!°:Ÿˆ-BƒHfƒTD¯cÖxƒhu—€€1Q’B F àN{rÑf2w¥]j ó©!P„‡l(–©b Q?…ôÄğ53Èl1ƒêö/•8Ç!Û…FtÚ‹Vš èªİT]Ê¹Ñ÷Ì9M&İÊyN^øf«¯E§•*|§Á6¡¹·ø‡Ÿ±N\"\$ëz§%[²^¬Ú½ ûfcåÎhÍNg	Š¬ƒ²±y1ààÍKl6ÕJaaH2†ËŸ¡Û[zëñ)l€Ú+Ñ¸°·§\\r¨1Ş‰­!kVìÙˆ×ÜVcª ±nÆˆ˜YXİk\"¼µ5¯Œe~Å›6\\A(L»È­ñ¢‹Cfâ>§ôè9?M9ÔÓº hmC¸•«1e‘m—K2ƒI‚@Ùr=ºÀƒÙs¦ZK~/ÏU2‡8Xˆº–³TJ”¿I·Öİ–Tèí!¤Ÿ…§Œ6¦ÊéšëËæÅœÆ¿Rc\$’’>«ó°›˜Ê³.ÔMåÚÔd‡_âÀ¬ëí(€";break;case"th":$g="à\\! ˆMÀ¹@À0tD\0†Â \nX:&\0§€*à\n8Ş\0­	EÃ30‚/\0ZB (^\0µAàK…2\0ª•À&«‰bâ8¸KGàn‚ŒÄà	I”?J\\£)«Šbå.˜®)ˆ\\ò—S§®\"•¼s\0CÙWJ¤¶_6\\+eV¸6r¸JÃ©5kÒá´]ë³8õÄ@%9«9ªæ4·®fv2° #!˜Ğj65˜Æ:ïi\\ (µzÊ³y¾W eÂj‡\0MLrS«‚{q\0¼×§Ú|\\Iq	¾në[­Rã|¸”é¦›©7;ZÁá4	=j„¸´Ş.óùê°Y7Dƒ	ØÊ 7Ä‘¤ìi6LæS˜€èù£€È0xè4\r/èè0ŒOËÚ¶í‘p—²\0@«-±p¢BP¤,ã»JQpXD1’™«jCb¹2ÂÎ±;èó¤…—\$3€¸\$›Ú4Ã<3«°ô/¬m£Jæ¹î‹®®å†á'ê6¯¹DÚ²Š6ªÉ@»•)[t‡¯ÌÀÁ+.Ú~¶ Êñs0/íŠpé#\r“Rµ'éL[IÎ“Ê•EhD)1q7±óŒhæ§ Ş\rlŸ\n(‹ÂE¤£9ÁîÂÀ¨*P“³>—t\\›8Ò*/¨ÔTI9—Ü&€‹35 khğ§¤Ë_ÈñÒH\"U¹³Œ°×Fò™q8Åã·.§Îe|€Õö’&“l UPÛIú¶¦sLìJ«/\$ı'§¥³XÔnK¶ä\"ÎUZ£±ÅaY93dÅ\\!Wj“eQ5Œõ‚ îlTÚ'´JÎé'ñ\$!,¢\nı€w„™Vaë¾\$¸b­ş.àËbª™ÊÖâ{Q;wŠûJ:ÉÈ“9PÒ\\¨CËø> PH…á g¢†*ÊØ«´¥‘W®‘3¶:VÎn;5êÛe78Î»'Ã„¢²¦lub»;+¹Š7mK,Y;ôûš²ªÍÇº¤98ä+‹¨§S‘*»°Ğk†­–¬>oºêñk+AJQ{·Bkqfça6%<àÅŠê»O‘ P\$Bhš\nbeH,‰ò;Fä…âÛV\\¢îá~®2'qyJ\rƒ åmjYfcäb³ÍIûİ¹‹CMÈ¨7¾ChÂ7!\0ê7c¨Æ1¿ƒ˜Ì:\0Ø7Œñàæ?Ã—Â0Œãxa.nQàu@  9‚“ŠsI™?[Ç}I¨Æ^S\nAœRàåRy°6‹aA9„Æw•Å*	š/çx“àI·RH=ê\"6p“2ÃdÆÙVö²¨ÑT	äíªe–çÓàUŠ¥;V¤Œ \no¤4†ğÜV\"Xsq47((J×Ñc/ nq#((bÔSI,d	‰ˆ°ÉX¼4„†ğé\"Æ²váJS…`(&†æC‘óÁÌ;†ğäÍÃ(x¤9PÈ\0<'®B†`zƒ@tÀğ^äÀ.!’\0àÊt~à¼2†éH+äŠ€¼àÂØt‘á}½ğÖğI\r¡Àü†ÙJà/ ùK‚	|Ã{7?ó0†³ŞC¡ó“ïzOàèq`±Ò9èj(g\"¢S©:pf@é)§œâˆ[‰Ø•¸8@P\0 Ä•…ùQ\$ô³#¸­H8HĞ™•R®V^ŒxÆ2«(] b1íx®Íç¨àú‰-¢w5²Â’ÁUS®†-‹‚ìp„k9'4í¶È¼·A9U‰\$¸¸Ü…Ôº¡(¶…µ	òYZ«‘p3ğ·ä\$Ob3.Æ™VRÒ ‰1¢õ(,ÎA(¦ µQÂçR\n-ĞœÇLR\0LÚò‰R&<ğ¶åpTŠ·¬åÀYsÒß|Rğ7É°A\"Ãiñ((„À@Áï>ò,#Iä÷Ù¸i—qúhÍƒxmÎOé@Á0<uZ‡CÓ~©S+*¤Ÿ¡Ä5k))á]Íj3+PçTÉ/1\n\nÙÚ\$ å-+‘¦“–.*r²vu¼I¬yEAˆ\\Úëj«HJ·C«Mn)K‚(6°ÆHc\ru`€øğN2ø*em¥šÒ°¬LÆ±Ü)ŸB¨TÀ´	JæJ<åaÿ3ƒ¶”“Î;evè°èÉqaüã:ÅªªOâ‚«‰ß;g'³•A£¦Áæã—sËäOÍ(îÕE×z+¢`ƒ½\$Kz—Ò__†Å,'cÂÒÄfHhpŞCœ¿ck»µ¶œæª”±Oí¡ƒ®…ÍÒ õ(‚WÊt^€ ™_C&ËÙ‚cGãŞ€Ğ[6ÈGqeÚâN×£Ç‰gä1 PÈVP£^y¦ÄY•˜<xak|Á•\n2bÆ˜Áã`+¸q—…wUNV8Ø İ/ufŠ+qkq\\J\0";break;case"tr":$g="E6šMÂ	Îi=ÁBQpÌÌ 9‚ˆ†ó™äÂ 3°ÖÆã!”äi6`'“yÈ\\\nb,P!Ú= 2ÀÌ‘H°€Äo<N‡XƒbnŸ§Â)Ì…'‰ÅbæÓ)ØÇ:GX‰ùœ@\nFC1 Ôl7ASv*|%4š F`(¨a1\râ	!®Ã^¦2Q×|%˜O3ã¥ĞßvMóÃA†\\ 7\\Îó´ÀÎe9ˆ—3©ÀÈa:sFƒNdépÉğ'˜éĞ«ÖËtFKÅèİ!¦vtÓ	´@e×ñĞ#>¿±ÇœÍæã‘„×ßßÌ ¢œ‚%Ö%M†Ã	º™:»§I÷r…?ÏÀÌF˜ù¸Ò 5ö»”	ı\"iñh`tÊtëTù;©ğÆ¡‹Àä£î£òŒ#’İ#Cd<CkºëLºPX9ã`Ò*˜#Œ£z˜:A\"cJĞÁ“j½Œ£ÈÒ1ÃîË·\0–0b\nhŞîDo`Ò²Bb÷±¯!cŒ,LøAe‹\\Œ‰³:2¤¬<µÊk€1¬–°\\“8c9³\0Òa”ïXäº#Èë¨ ­’hæŸ>pŠ<· Ë8/¡hàŠ4ñ4#É‹^å«ë¥ôZ;KC-\rD\"èÊ7K¤ ÒK2¨ÂØÓT8æÓ£²^6TI:Ê4µ¨)‡B ˆhˆ¶<ØÈºŒ#Z3¸¢²^ˆPe86E ê7ªxaéğÖŸH‚ Ş¹ÂÃpòZcª1³˜ÌíÎac49\\cÎ0¥‰d´€ÚP9…)<I8#È0ô¦)ÁH@58€\\É(Ú4#[›9¤‘ºN!+,ŸP¼ám[„úè0(ÈŸ\$âzv9­ò;UŒª›Şà9è\r‰ö_%æ9jˆ@ÌÃŞ™Ö­ä6/ Ì˜³C.5£Ë•å¯¨&Œ9Äæ8l#˜î’Ê£(ğ8=ƒ(É‰‡ˆ¸Ğ9£0z\r è8Ax^;ğuO~#ÁrJ3…é<?H3–„LÔË›¸¾¸»£XD	#hàÜ&# xŒ!òˆÌÄã@ß*³h#œÑ\r,(à\\=\nN*¼Ct”Ã\rh“1Œ¤#v¨(	ƒ£à‰ƒÚ aB‹‡4“„ä÷¿Š{\n©*ƒffà¨CáZCÌBR• ir?à·èÌ0NàA< cœ£=–?zË—f\0™¨êhŠTYÈŸ#È è Ô”yÃq'[›€ò^X \n<)…CdGÈ2ò|Á¥>óÄ´ã+*\$]ÿ˜&±ÈÙ2ä÷.@òÖ˜ Gè4ç5ÄG\n\n|\$æ(3º¹øoTï¼›Î˜Q	€€3ZH¸F\nî¥Uh¡Ã‘…v109\"e˜Ÿ1ªJ&ƒ!â8¨Î2b0¤d^åĞvÉŠ±&ÿµgƒ’ĞkŒfü:!Øâ¨Õ+ï61ê5GÈıØùì€Me½„†'ŞHr)E7ŠrX‹Ïi¢h 6´”_ÒŒ	A'1uVM\n¡P#ĞpúC«8„<Ç¹*²Îq§<êÁ˜HNp„…–ä}÷†¹tş‰'-åÄ¹‡5šL\nb¶	²È3û‚CÅ–? ãh^Qƒ¾‘“GY#\$Á•%“|Û:¬TÏšJ~‡Ğø é(y}`(åà³\$¤H0˜Ø˜ût.”\0éËXÕ/¤cH^éúT S¤„1šÈ£ÃH”²7êf2\rClbR‰tƒæaæ3ğ\\÷ÃJ`\\£šR<Å¹‰U'1ì";break;case"uk":$g="ĞI4‚É ¿h-`­ì&ÑKÁBQpÌÌ 9‚š	Ørñ ¾h-š¸-}[´¹Zõ¢‚•H`Rø¢„˜®dbèÒrbºh d±éZí¢Œ†Gà‹Hü¢ƒ Í\rõMs6@Se+ÈƒE6œJçTd€Jsh\$g\$æG†­fÉj> ”CˆÈf4†ãÌj¾¯SdRêBû\rh¡åSEÕ6\rVG!TI´ÂV±‘ÌĞÔ{Z‚L•¬éòÊ”i%QÏB×ØÜvUXh£ÚÊZ<,›Î¢A„ìeâÈÒv4›¦s)Ì@tåNC	Ót4zÇC	‹¥kK´4\\L+U0\\F½>¿kCß5ˆAø™2@ƒ\$M›à¬4é‹TA¥ŠJ\\GB›Œ4Ã;äõ!/«î¿(+`˜²ê’P¤¿ê{\\’µ\r'¬²TÏSX6„‹VZ(è\"I(L©` Œ¹ Ê±\nËf@¦‘\\¦‹’š¦.)Dæ‰™«(S³kZÚ±-êê„—.ëYD’¡~ÈHMƒVƒF: ‚£E:f¡FèÑ(É³ËšlÉGÓL•·‘A¡;–Szu CD´RöJ©‘`hr@=„¼®Á†BƒÎs;âh4ÈTJ &\n4MMš_5²d:4O²jÊ@£ˆÑGDšCáW¦%àNÜ¦‘„º½’\"èG31R­¥s*‚‰Œˆ#@±%àHKhÂ–£=k[sU·Å`ÇèÒ]E¨\\wXc^1CV]#EŒf£…­ÚSr\rWM¤ZĞR‰”¬‡Ó\$¥1ªw²³aE(Z6Œ.‹]7–›R¦¤ú›zPr\\ñOY4¼Ğâüec«‚c.“¢b†¤ö»ôËc\nj<’`ğX\\­-^Z¤äÙQ,ÖÃ\\?Ê£C·9şƒ–)Z#w“ÆúFmND-ö›¡ÌbÖ”Æy [Ò&.Û¶Se\n4¦vœ^Âİ.@obîağõô–¢\0PØ:Wä*¬ Ôfÿ]E Şåâƒpò£pæ:Œcª9ŒÃ¨Ø\rƒxÏqçËŒ#>*7†’\r°€êï˜Rµ³Z»}\$Ké*®!ŠbŒÎãû\\‚#š,¤‘«´±°U*âÊh‘(L•–ëZ3 Ñ.‡IšI3é²…!É:qpµÓv*ºKæøò¦†Üö’ŸÁi©J¬Û	~Uc•˜Óy.2EM•rFM”TtZ†wÊ®\n'Ôª‰›)è}š!¡Ohagx9ÈTÃ¸oKD2‡€àCe,‰C0=A :@àx/ñ,ÈíCpe@ºp^CtWyÍßA×!ÈêH„Ï0a\rÁ¬à’CÒ\r±`:À^AòXv”ğõ¢v a\rg 4‡C™œ¬tw†ØX\$öÎóÍš1„hßÒ’’ŸHP	@ŸÉ”äŒz` ³‚˜0öI9NkÊ­!Gö# áQğA&¯£‘²!ÆE£öÙ‘ò´!âX¥³42¡D*K)å­;Ësr}‹²Á …>¶œQJ;D †õèƒzš ¡şMRè¤›1\nı^‚áymM«ÁHIT%+Øß+D¤ôQ©g=Í—¤TzCŸ:W\$~Åà \n<)…Eò‰Hlæg¥‚’åä]•=TªC>ÕgšoÔ^3vÊ¯Pª–+ëêP¥HIL¼zLä€—‚¦ÑxÑ4eĞKœ„jsÄ7ÄàAƒià€)…˜1Ñ9B`¨*8nZ!¦8C)\r!j€r\rá´ŒE#ØÒœHoéªJ”|ø›	Ÿk59ÖÃC*JÜ	®\"ú¹Ö¢‚Yë³ãCd¬ƒ3Ä@ZÙ]wCåpß´¶%~-JÄ´:óckÛ³läÅg>»(Ğ©®³šÙ8ª§P\nn 6´ÎQñ•\\ô–mY²›k‹ù{4XØºô‰Ó1:\$Î¹\0 T u…`€1HG`B F àE€Ç€g'ŒÙK›¦š.¬	JMäxÃ©uJ‚Y£?»òï)ëÂIï\\¼È¨–×%¸n/lÜƒĞFÅ_Êß/:l°ë\$Í˜¤LI§û\r§+ØšÏN†ŠÈ	·`3“|\nPğ—, zE’¿7D¤ÊŸê‰P9¬Wd\0’¤û0	«r	*òÍf²ş 5» ¶úÌ\\l!Õ¶U¶å¨¯ÄŠ¥ìÂ:#S8Øã„*(d» +(T`ÛAÜ<‹BüKd}îêúÄ¹‚öf\$Ş¸ˆ[òzgÕ(²Â°Iz\r§H1àÈ©ë¹vÅJJÍ[å€Ö@¼‰¡çµ>*›#LÔBc¼Š?ƒÍ\"&=hÊ~™æó3¡;9PñR à";break;case"vi":$g="Bp®”&á†³‚š *ó(J.™„0Q,ĞÃZŒâ¤)vƒ@Tf™\nípj£pº*ÃV˜ÍÃC`á]¦ÌrY<•#\$b\$L2–€@%9¥ÅIÄô×ŒÆÎ“„œ§4Ë…€¡€Äd3\rFÃqÀät9N1 QŠE3Ú¡±hÄj[—J;±ºŠo—ç\nÓ(©Ubµ´da¬®ÆIÂ¾Ri¦Då\0\0A)÷XŞ8@q:g!ÏC½_#yÃÌ¸™6:‚¶ëÑÚ‹Ì.—òŠšíK;×.ğ€¢™„ìi¶n÷»øì¬ÛÀ€ğÁEƒ{\rB\n'î¹»Ší_ÌÁˆ2œka§‚!W¹&Asv6Î'HáÈŞÆ»ÉÛä÷ ÉvO„IvL®Ã˜Â:‡J8æ¥©©B‚a”kºjÊ*Ì#ìÓŠX„\n\npEÉš44…K\nÁd‹ÀñÈ@3Äè!ªpK P›k¼<ÈH\n3°Ã|•’/Ğ\"1J'\0øÒ•ªÈ	Z80ÒãÈ›'ëêa¾ò`›/?ŠzT·&! bkëç/B<@Ë(3¤í/%3öšL©\$q*°ÌCŒ‹Èò:¡@æLpÑª PH…¡ gN†³	Xën	~Å/E+ø1§L a”MË]é@ğìÌÒpM¤š	\n,­Ak`°2±S”N¡¦IÁYÒ6Fs!w3Fìƒ'< ÕS’a+\rfPÅöÒF£©µ_¼¥l<4D<º¬X@t&‰¡Ğ¦)BØó\"èZ6¡hÈ2;vCÔÊ²ìÈ6-„Û´KºPŒü”¸eª'i#Š*H§ÉËÚÔ;ÌİèÕ³Cd¹G#¯Nd¬dlÕ>Ftş\rÌ¨Â—HpÍJœnºĞ¡ˆb˜¤#dcNi›FÑM\0”ÉI ÅlÓò]cª]qC(î6şøÎ—=ÅÓá >ió6\"c(æ9/ú\\(^“TP:îzšÂğËæ_š¼1O³«g;¥ÙCMeÑ[6¾s…ßš»/å|–„â†4C(Ì„C@è:Ğ^ı¨\\0Œƒk 2ApŞ9áxÊ7xCÅ 7oø^#ƒ€2`¾1\r’¨ÖÌ;Òƒ)’‰ÂxÂ[èüo= «WË\r	rè¨Ã[¤	\"§DIø»”\n¢.…¹ü\n (ELfˆğ—?¤á“ Ş„Š[& ·µR–ËÎügi}	>–äU“ñRQ@¸†Ğ²Ögñ+µzÇßQhZÂt»R~”`híTœCü~Ñükí1±Ê\nIpDb±z¢\"DI	Q,á@'…0¨iÃ«-fDåÒ,nùÉ¤&yv“rrNÎ)=‡D[ÆˆC…,b±+†^I—»—BQ!âÎ_1WnÑ¥Ê¦#ì]‚0T€¦ø£5§4J\$dcP‘7êÃÏ3\$Í™p‰ˆÛNóg“Ğ5­Èç7(’!Õ1% —3ôÜù.A(‹±*‡‚qó¤!–€Ù\n\rú©p¥ıó²ÒĞ‰ß) 9&\nbQ+Û²FqLm»‹¡bcQêo T*`Z%B”Ä £\"dâ\\M}Æ24À@që2Ñ1‰#—KÙ×2|ê•]&S,Â„DĞ_Zü “\$šK7Ë-æ,•˜âìE™²ŠmK8rJ©01£äbS•3i)0,vœ¢¤Äó‰¤89Îc\$“¡İ· ¸&èbÁ\"GdxF†ã˜d‘‡§m¥Tx¤s¦ä*G5H©§Ôé3'õ·w»5M”}«(ÀHÒâÙ=ŠKD4¦Mpê";break;case"zh":$g="ä^¨ês•\\šr¤îõâ|%ÌÂ:\$\nr.®„ö2Šr/d²È»[8Ğ S™8€r©!T¡\\¸s¦’I4¢b§r¬ñ•Ğ€Js!Kd²u´eåV¦©ÅDªX,#!˜Ğj6 §:¥t\nr£“îU:.Z²PË‘.…\rVWd^%äŒµ’r¡T²Ô¼*°s#UÕ`QdŞu'c(€ÜoF“±¤Øe3™Nb¦`êp2N™S¡ Ó£:LYñta~¨&6ÛŠ‹•r¶s®Ôükó{¾”òf“qŸw¹ß-œ×ü\n–2‹Œ #*«B!@éL©N…zµĞ¨@F«÷:QQãW­àÏs¡~™r.“ndJ¥ÊX’¨ËŠ;.ÚM(ìbx¦¥¹dè*ŒcÚTÄAns–%ÙÊO-Ç3¨ì!J—ç1.[\$¹h´¤¹ÎVÈÉdŒDcìMœ¤Al²¤‹‚N-9@€§)6_¥éDî’ë£Şã/KáÊLÉït*[¡\$jĞWÇ9@@¬„Ì4^’­ÙÌF'<Å\$Ì©!`r—eÔ<Ä1HxÈDA–-ËA b¥¤8s–’ZN]œÄ\"†^‘§9zW%¤s\0]ïAÈÑYÊE€tIÌE•+!(ZªÒAÊbZN”§Aî#%ÙÒQ7O	[¤y#TL,î 5jŸAÖ-@0‘7ª€P\$Bhš\nb˜-7(ò.…ÃhÚƒ TUUdæÄÓ`è9%¤âE2›ŞseAÒJ=\" ŞÌ\r£Ü<„¨Ü9£ÆÑc0ê6`Ş3¹ƒ˜XÒX`Â3Œ.`A“YA\0Úæ­XP9…-¬LÃ\0†)ŠB0@“”‡9F*ÇIFÍÖ•‘'¤i+`8\n’>Æ\nx Ò7ÓÁ~B%	vtEZWÂz¦­¬OsìCÄˆdløèZ!,XMS–»‰£æÕLÎô9ãxå;Œ£Àà4C(ÈàÂÈñ#0z\r è8Ax^;ópÂ2ecpÊ9ÜÎŒ£wP<5x~¯ÕM Â94#§&/¶xPÖÂHÚ83ãoR:xÂ(Í„Öó»K•#[*4ŒÏG„ôCpé™.“øÿ@zâNUD¡_3Í)Ğ@(	€Aï¿ò)²=Èa£¡„LÂÃÄAÊ!Åjô1ƒ [VÖK‰20\$Ô›“‘ˆ0®©Í¡ò¬yÀ¢ÊŒP<“LEQ?Ï¬'…0¨ûÌ<%oüG”\"¼ÌR/B\0BX5H \"J©qÊ\$Hğ»†0Ç\0ÆÂ˜kÀ\rî|8ğÄC8 \naD&\0ÌgŒ©qá*>æÃK¿pOUêE`äÃh nŒÊ:BĞ´Nñàt\\q6bËº\rC˜M‹Dİ#´x%‘èé˜ #º	.ì¤íÈ‚\n#Äº9MâôXQ&#L`C^á°†0ØCk\r¡Ç‡`Â©¬a44†fõ\r¨F‹¨:·°@›Y\n¡P#ĞpHc•‡4Ú²’è##Ğåâğê˜ÂœGêğUb¤ò+’ê‚l¬•Ë¼L”õ8Z(³JA~\\D¯/	D¾Ÿ4&”@ébøsäF®'0®ÂP\\ÍQÊ áŒk¢Ôt‰Ô—HA2%†C˜s¨dL\r®Êš“bÇ%¢%§¾C‚\$Ç0H\rTÏ†3V»‰‰OGInfrÏ2¦a‚-Q' !Ì¢”`¢†\na'1B#œë91P";break;case"zh-tw":$g="ä^¨ê%Ó•\\šr¥ÑÎõâ|%ÌÎu:HçB(\\Ë4«‘pŠr –neRQÌ¡D8Ğ S•\nt*.tÒI&”G‘N”ÊAÊ¤S¹V÷:	t%9Sy:\"<r«STâ ,#!˜Ğj61uL\0¼–£“îU:.–²I9“ˆ—BÍæK&]\nDªXç[ªÅ}-,°r¨“ÖûÎöŒ¿‹&ó¨€Ğa;Dãx€àr4&Ã)œÊs3§SÂtÍ\rAĞÂbÒ¥¨E•E1»ŞÔ£Êg:åxç]#0, (§˜4›Œü\r÷ñˆÅG‘qäZ†–¢SÅ )ĞªOLP\0¨ıÎ”«:}µï»áÚr¢òå´yZî¤se¢\\BœÅABs–¤ @¤2*bPr–î\n¦ª²/kŞÁ)ÒP“Ç)<·Ä©p¨’êY.R®DùÌLGI,I¥¥i.Oc’t’\0F¢å±dtì)Ê\\—È*ğ’ëÚ¬å°eyÊLªÇ)pYÊr•ä2´äÉv—ªY`\\…É0Ìd,Êë±\$ñÒPMdÙ\\‡Œ\0Ä<¶@æCËN3€PH…Á gD†ªY N(KqÈ]—g1GÇç9{;œÄq\$r—Dx'È:ZE£¥é9Q%ÄCÔdÜÆV’IZÒe³Ø_ÇAU=…Å*KªÉá	\\¥¥yråÒ[\nË–]›Ï*[WÙlÈœäy|ª*Â@	¢ht)Š`P¶<İƒÈº\r£h\\2•e\\Iëªî¼C`è9=…át¹*¢/1Y–p¨7³£hÂ7!\0ê7c¨Æ1´ã˜Ì:\0Ø7Œîˆæ5#–\"0Œã¢ea,ò6º#¬û?·HÂ4J‘	¤!ŠbŒÔãXÊ7/Ï‘täk¯0—‘â`¾¤±]‘	ñOÍ˜K\")ã#HŞ7)AĞQg)+¬>Ş»¯ì0©Ò@‘ÑjFhÚF”Ãë3s\"&Œ#›`93Üæ;ã”ò2€Ò9£ \\ƒ-ÈÁèD4ƒ àáxïÑ…ÃÉ˜\rÃ(äq#8_¡õãÃaŠkÃp^5#äÓœĞ¾ÜaãXD	#hàÒ\rºèã}µKd7Ï-PA‡hY`èÏuXwR7™ª3@Ä,A„#¹4™w%Ä¡^så¦t(	‡ÉÁ0\\CAH!‚%n>6pÎ‡0†# VÀBVy…²n„¸˜&tŠ0®¨”\\4‚ˆMK€'å³´SæœG(ŠB…\0Â  _EàL“ñUËğæl¡@²í\r0ˆÃ¡ÂˆTô:&\"´ƒˆKÌ™•l=‰<pŞé–A¤3‚\0¦B` ÆŒÍ',‚ P‹!¹<†—Œâ^Øi{a˜9ğÚ›ª3.¬ó\n‘dœÓ¨®B‰\r´“Æ&O,ƒÂlZy\09Ó±‘‘F8Èôí	c.@-:I	#ÏØˆ1ôX‘>/ÌˆC_á°†0ØCk\rÁË`Â©±a¯P4†f#ĞFŒ\\:¸\$ôf™XU\nƒ€@ĞÃ¼:FêAQ”“s.1ğÆæ½×Ì~†eå'\0 ›/%ò£%@C\n PÜÄô:j\0t‰q8:	…J5\r	ö+Ñà£A‚@r+ÁÈ/Åsñ&E9ˆ–'!¾‡r†€ ™Ã!Ñ:t^,×fq¶O<¥ˆ‘\0û(æÊ­®@Æl¨è‹äQ‹Ò[5ØM7›	•pN8j.…XæQêDóCùÈ_0¡p‹˜¢K…B¶\0";break;}$xf=array();foreach(explode("\n",lzw_decompress($g))as$X)$xf[]=(strpos($X,"\t")?explode("\t",$X):$X);return$xf;}if(!$xf)$xf=get_translations($ba);if(extension_loaded('pdo')){class
Min_PDO
extends
PDO{var$_result,$server_info,$affected_rows,$errno,$error;function
__construct(){global$b;$ce=array_search("SQL",$b->operators);if($ce!==false)unset($b->operators[$ce]);}function
dsn($Ab,$V,$H){try{parent::__construct($Ab,$V,$H);}catch(Exception$Ob){auth_error($Ob->getMessage());}$this->setAttribute(13,array('Min_PDOStatement'));$this->server_info=$this->getAttribute(4);}function
query($I,$Df=false){$J=parent::query($I);$this->error="";if(!$J){list(,$this->errno,$this->error)=$this->errorInfo();return
false;}$this->store_result($J);return$J;}function
multi_query($I){return$this->_result=$this->query($I);}function
store_result($J=null){if(!$J){$J=$this->_result;if(!$J)return
false;}if($J->columnCount()){$J->num_rows=$J->rowCount();return$J;}$this->affected_rows=$J->rowCount();return
true;}function
next_result(){if(!$this->_result)return
false;$this->_result->_offset=0;return@$this->_result->nextRowset();}function
result($I,$p=0){$J=$this->query($I);if(!$J)return
false;$L=$J->fetch();return$L[$p];}}class
Min_PDOStatement
extends
PDOStatement{var$_offset=0,$num_rows;function
fetch_assoc(){return$this->fetch(2);}function
fetch_row(){return$this->fetch(3);}function
fetch_field(){$L=(object)$this->getColumnMeta($this->_offset++);$L->orgtable=$L->table;$L->orgname=$L->name;$L->charsetnr=(in_array("blob",(array)$L->flags)?63:0);return$L;}}}$yb=array();class
Min_SQL{var$_conn;function
Min_SQL($h){$this->_conn=$h;}function
quote($Y){return($Y===null?"NULL":$this->_conn->quote($Y));}function
select($R,$N,$Z,$s,$E=array(),$_=1,$F=0,$he=false){global$b,$y;$Qc=(count($s)<count($N));$I=$b->selectQueryBuild($N,$Z,$s,$E,$_,$F);if(!$I)$I="SELECT".limit(($_GET["page"]!="last"&&+$_&&$s&&$Qc&&$y=="sql"?"SQL_CALC_FOUND_ROWS ":"").implode(", ",$N)."\nFROM ".table($R),($Z?"\nWHERE ".implode(" AND ",$Z):"").($s&&$Qc?"\nGROUP BY ".implode(", ",$s):"").($E?"\nORDER BY ".implode(", ",$E):""),($_!=""?+$_:null),($F?$_*$F:0),"\n");$Ue=microtime(true);$K=$this->_conn->query($I);if($he)echo$b->selectQuery($I,format_time($Ue));return$K;}function
delete($R,$ne,$_=0){$I="FROM ".table($R);return
queries("DELETE".($_?limit1($I,$ne):" $I$ne"));}function
update($R,$P,$ne,$_=0,$Ke="\n"){$Pf=array();foreach($P
as$z=>$X)$Pf[]="$z = $X";$I=table($R)." SET$Ke".implode(",$Ke",$Pf);return
queries("UPDATE".($_?limit1($I,$ne):" $I$ne"));}function
insert($R,$P){return
queries("INSERT INTO ".table($R).($P?" (".implode(", ",array_keys($P)).")\nVALUES (".implode(", ",$P).")":" DEFAULT VALUES"));}function
insertUpdate($R,$M,$fe){return
false;}function
begin(){return
queries("BEGIN");}function
commit(){return
queries("COMMIT");}function
rollback(){return
queries("ROLLBACK");}}$yb["sqlite"]="SQLite 3";$yb["sqlite2"]="SQLite 2";if(isset($_GET["sqlite"])||isset($_GET["sqlite2"])){$de=array((isset($_GET["sqlite"])?"SQLite3":"SQLite"),"PDO_SQLite");define("DRIVER",(isset($_GET["sqlite"])?"sqlite":"sqlite2"));if(class_exists(isset($_GET["sqlite"])?"SQLite3":"SQLiteDatabase")){if(isset($_GET["sqlite"])){class
Min_SQLite{var$extension="SQLite3",$server_info,$affected_rows,$errno,$error,$_link;function
Min_SQLite($Zb){$this->_link=new
SQLite3($Zb);$Rf=$this->_link->version();$this->server_info=$Rf["versionString"];}function
query($I){$J=@$this->_link->query($I);$this->error="";if(!$J){$this->errno=$this->_link->lastErrorCode();$this->error=$this->_link->lastErrorMsg();return
false;}elseif($J->numColumns())return
new
Min_Result($J);$this->affected_rows=$this->_link->changes();return
true;}function
quote($Q){return(is_utf8($Q)?"'".$this->_link->escapeString($Q)."'":"x'".reset(unpack('H*',$Q))."'");}function
store_result(){return$this->_result;}function
result($I,$p=0){$J=$this->query($I);if(!is_object($J))return
false;$L=$J->_result->fetchArray();return$L[$p];}}class
Min_Result{var$_result,$_offset=0,$num_rows;function
Min_Result($J){$this->_result=$J;}function
fetch_assoc(){return$this->_result->fetchArray(SQLITE3_ASSOC);}function
fetch_row(){return$this->_result->fetchArray(SQLITE3_NUM);}function
fetch_field(){$e=$this->_offset++;$U=$this->_result->columnType($e);return(object)array("name"=>$this->_result->columnName($e),"type"=>$U,"charsetnr"=>($U==SQLITE3_BLOB?63:0),);}function
__desctruct(){return$this->_result->finalize();}}}else{class
Min_SQLite{var$extension="SQLite",$server_info,$affected_rows,$error,$_link;function
Min_SQLite($Zb){$this->server_info=sqlite_libversion();$this->_link=new
SQLiteDatabase($Zb);}function
query($I,$Df=false){$ud=($Df?"unbufferedQuery":"query");$J=@$this->_link->$ud($I,SQLITE_BOTH,$o);$this->error="";if(!$J){$this->error=$o;return
false;}elseif($J===true){$this->affected_rows=$this->changes();return
true;}return
new
Min_Result($J);}function
quote($Q){return"'".sqlite_escape_string($Q)."'";}function
store_result(){return$this->_result;}function
result($I,$p=0){$J=$this->query($I);if(!is_object($J))return
false;$L=$J->_result->fetch();return$L[$p];}}class
Min_Result{var$_result,$_offset=0,$num_rows;function
Min_Result($J){$this->_result=$J;if(method_exists($J,'numRows'))$this->num_rows=$J->numRows();}function
fetch_assoc(){$L=$this->_result->fetch(SQLITE_ASSOC);if(!$L)return
false;$K=array();foreach($L
as$z=>$X)$K[($z[0]=='"'?idf_unescape($z):$z)]=$X;return$K;}function
fetch_row(){return$this->_result->fetch(SQLITE_NUM);}function
fetch_field(){$D=$this->_result->fieldName($this->_offset++);$Yd='(\\[.*]|"(?:[^"]|"")*"|(.+))';if(preg_match("~^($Yd\\.)?$Yd\$~",$D,$B)){$R=($B[3]!=""?$B[3]:idf_unescape($B[2]));$D=($B[5]!=""?$B[5]:idf_unescape($B[4]));}return(object)array("name"=>$D,"orgname"=>$D,"orgtable"=>$R,);}}}}elseif(extension_loaded("pdo_sqlite")){class
Min_SQLite
extends
Min_PDO{var$extension="PDO_SQLite";function
Min_SQLite($Zb){$this->dsn(DRIVER.":$Zb","","");}}}if(class_exists("Min_SQLite")){class
Min_DB
extends
Min_SQLite{function
Min_DB(){$this->Min_SQLite(":memory:");}function
select_db($Zb){if(is_readable($Zb)&&$this->query("ATTACH ".$this->quote(preg_match("~(^[/\\\\]|:)~",$Zb)?$Zb:dirname($_SERVER["SCRIPT_FILENAME"])."/$Zb")." AS a")){$this->Min_SQLite($Zb);return
true;}return
false;}function
multi_query($I){return$this->_result=$this->query($I);}function
next_result(){return
false;}}}class
Min_Driver
extends
Min_SQL{function
insertUpdate($R,$M,$fe){$Pf=array();foreach($M
as$P)$Pf[]="(".implode(", ",$P).")";return
queries("REPLACE INTO ".table($R)." (".implode(", ",array_keys(reset($M))).") VALUES\n".implode(",\n",$Pf));}}function
idf_escape($v){return'"'.str_replace('"','""',$v).'"';}function
table($v){return
idf_escape($v);}function
connect(){return
new
Min_DB;}function
get_databases(){return
array();}function
limit($I,$Z,$_,$Ed=0,$Ke=" "){return" $I$Z".($_!==null?$Ke."LIMIT $_".($Ed?" OFFSET $Ed":""):"");}function
limit1($I,$Z){global$h;return($h->result("SELECT sqlite_compileoption_used('ENABLE_UPDATE_DELETE_LIMIT')")?limit($I,$Z,1):" $I$Z");}function
db_collation($m,$Za){global$h;return$h->result("PRAGMA encoding");}function
engines(){return
array();}function
logged_user(){return
get_current_user();}function
tables_list(){return
get_key_vals("SELECT name, type FROM sqlite_master WHERE type IN ('table', 'view') ORDER BY (name = 'sqlite_sequence'), name",1);}function
count_tables($l){return
array();}function
table_status($D=""){global$h;$K=array();foreach(get_rows("SELECT name AS Name, type AS Engine FROM sqlite_master WHERE type IN ('table', 'view') ".($D!=""?"AND name = ".q($D):"ORDER BY name"))as$L){$L["Oid"]=1;$L["Auto_increment"]="";$L["Rows"]=$h->result("SELECT COUNT(*) FROM ".idf_escape($L["Name"]));$K[$L["Name"]]=$L;}foreach(get_rows("SELECT * FROM sqlite_sequence",null,"")as$L)$K[$L["name"]]["Auto_increment"]=$L["seq"];return($D!=""?$K[$D]:$K);}function
is_view($S){return$S["Engine"]=="view";}function
fk_support($S){global$h;return!$h->result("SELECT sqlite_compileoption_used('OMIT_FOREIGN_KEY')");}function
fields($R){global$h;$K=array();$fe="";foreach(get_rows("PRAGMA table_info(".table($R).")")as$L){$D=$L["name"];$U=strtolower($L["type"]);$pb=$L["dflt_value"];$K[$D]=array("field"=>$D,"type"=>(preg_match('~int~i',$U)?"integer":(preg_match('~char|clob|text~i',$U)?"text":(preg_match('~blob~i',$U)?"blob":(preg_match('~real|floa|doub~i',$U)?"real":"numeric")))),"full_type"=>$U,"default"=>(preg_match("~'(.*)'~",$pb,$B)?str_replace("''","'",$B[1]):($pb=="NULL"?null:$pb)),"null"=>!$L["notnull"],"privileges"=>array("select"=>1,"insert"=>1,"update"=>1),"primary"=>$L["pk"],);if($L["pk"]){if($fe!="")$K[$fe]["auto_increment"]=false;elseif(preg_match('~^integer$~i',$U))$K[$D]["auto_increment"]=true;$fe=$D;}}$Se=$h->result("SELECT sql FROM sqlite_master WHERE type = 'table' AND name = ".q($R));preg_match_all('~(("[^"]*+")+|[a-z0-9_]+)\s+text\s+COLLATE\s+(\'[^\']+\'|\S+)~i',$Se,$C,PREG_SET_ORDER);foreach($C
as$B){$D=str_replace('""','"',preg_replace('~^"|"$~','',$B[1]));if($K[$D])$K[$D]["collation"]=trim($B[3],"'");}return$K;}function
indexes($R,$i=null){global$h;if(!is_object($i))$i=$h;$K=array();$Se=$i->result("SELECT sql FROM sqlite_master WHERE type = 'table' AND name = ".q($R));if(preg_match('~\bPRIMARY\s+KEY\s*\((([^)"]+|"[^"]*")++)~i',$Se,$B)){$K[""]=array("type"=>"PRIMARY","columns"=>array(),"lengths"=>array(),"descs"=>array());preg_match_all('~((("[^"]*+")+)|(\S+))(\s+(ASC|DESC))?(,\s*|$)~i',$B[1],$C,PREG_SET_ORDER);foreach($C
as$B){$K[""]["columns"][]=idf_unescape($B[2]).$B[4];$K[""]["descs"][]=(preg_match('~DESC~i',$B[5])?'1':null);}}if(!$K){foreach(fields($R)as$D=>$p){if($p["primary"])$K[""]=array("type"=>"PRIMARY","columns"=>array($D),"lengths"=>array(),"descs"=>array(null));}}$Te=get_key_vals("SELECT name, sql FROM sqlite_master WHERE type = 'index' AND tbl_name = ".q($R),$i);foreach(get_rows("PRAGMA index_list(".table($R).")",$i)as$L){$D=$L["name"];$w=array("type"=>($L["unique"]?"UNIQUE":"INDEX"));$w["lengths"]=array();$w["descs"]=array();foreach(get_rows("PRAGMA index_info(".idf_escape($D).")",$i)as$Be){$w["columns"][]=$Be["name"];$w["descs"][]=null;}if(preg_match('~^CREATE( UNIQUE)? INDEX '.preg_quote(idf_escape($D).' ON '.idf_escape($R),'~').' \((.*)\)$~i',$Te[$D],$te)){preg_match_all('/("[^"]*+")+( DESC)?/',$te[2],$C);foreach($C[2]as$z=>$X){if($X)$w["descs"][$z]='1';}}if(!$K[""]||$w["type"]!="UNIQUE"||$w["columns"]!=$K[""]["columns"]||$w["descs"]!=$K[""]["descs"]||!preg_match("~^sqlite_~",$D))$K[$D]=$w;}return$K;}function
foreign_keys($R){$K=array();foreach(get_rows("PRAGMA foreign_key_list(".table($R).")")as$L){$hc=&$K[$L["id"]];if(!$hc)$hc=$L;$hc["source"][]=$L["from"];$hc["target"][]=$L["to"];}return$K;}function
view($D){global$h;return
array("select"=>preg_replace('~^(?:[^`"[]+|`[^`]*`|"[^"]*")* AS\\s+~iU','',$h->result("SELECT sql FROM sqlite_master WHERE name = ".q($D))));}function
collations(){return(isset($_GET["create"])?get_vals("PRAGMA collation_list",1):array());}function
information_schema($m){return
false;}function
error(){global$h;return
h($h->error);}function
check_sqlite_name($D){global$h;$Ub="db|sdb|sqlite";if(!preg_match("~^[^\\0]*\\.($Ub)\$~",$D)){$h->error=lang(21,str_replace("|",", ",$Ub));return
false;}return
true;}function
create_database($m,$d){global$h;if(file_exists($m)){$h->error=lang(22);return
false;}if(!check_sqlite_name($m))return
false;try{$A=new
Min_SQLite($m);}catch(Exception$Ob){$h->error=$Ob->getMessage();return
false;}$A->query('PRAGMA encoding = "UTF-8"');$A->query('CREATE TABLE adminer (i)');$A->query('DROP TABLE adminer');return
true;}function
drop_databases($l){global$h;$h->Min_SQLite(":memory:");foreach($l
as$m){if(!@unlink($m)){$h->error=lang(22);return
false;}}return
true;}function
rename_database($D,$d){global$h;if(!check_sqlite_name($D))return
false;$h->Min_SQLite(":memory:");$h->error=lang(22);return@rename(DB,$D);}function
auto_increment(){return" PRIMARY KEY".(DRIVER=="sqlite"?" AUTOINCREMENT":"");}function
alter_table($R,$D,$q,$ec,$cb,$Jb,$d,$Da,$Wd){$Mf=($R==""||$ec);foreach($q
as$p){if($p[0]!=""||!$p[1]||$p[2]){$Mf=true;break;}}$c=array();$Rd=array();foreach($q
as$p){if($p[1]){$c[]=($Mf?$p[1]:"ADD ".implode($p[1]));if($p[0]!="")$Rd[$p[0]]=$p[1][0];}}if(!$Mf){foreach($c
as$X){if(!queries("ALTER TABLE ".table($R)." $X"))return
false;}if($R!=$D&&!queries("ALTER TABLE ".table($R)." RENAME TO ".table($D)))return
false;}elseif(!recreate_table($R,$D,$c,$Rd,$ec))return
false;if($Da)queries("UPDATE sqlite_sequence SET seq = $Da WHERE name = ".q($D));return
true;}function
recreate_table($R,$D,$q,$Rd,$ec,$x=array()){if($R!=""){if(!$q){foreach(fields($R)as$z=>$p){$q[]=process_field($p,$p);$Rd[$z]=idf_escape($z);}}$ge=false;foreach($q
as$p){if($p[6])$ge=true;}$_b=array();foreach($x
as$z=>$X){if($X[2]=="DROP"){$_b[$X[1]]=true;unset($x[$z]);}}foreach(indexes($R)as$Vc=>$w){$f=array();foreach($w["columns"]as$z=>$e){if(!$Rd[$e])continue
2;$f[]=$Rd[$e].($w["descs"][$z]?" DESC":"");}if(!$_b[$Vc]){if($w["type"]!="PRIMARY"||!$ge)$x[]=array($w["type"],$Vc,$f);}}foreach($x
as$z=>$X){if($X[0]=="PRIMARY"){unset($x[$z]);$ec[]="  PRIMARY KEY (".implode(", ",$X[2]).")";}}foreach(foreign_keys($R)as$Vc=>$hc){foreach($hc["source"]as$z=>$e){if(!$Rd[$e])continue
2;$hc["source"][$z]=idf_unescape($Rd[$e]);}if(!isset($ec[" $Vc"]))$ec[]=" ".format_foreign_key($hc);}queries("BEGIN");}foreach($q
as$z=>$p)$q[$z]="  ".implode($p);$q=array_merge($q,array_filter($ec));if(!queries("CREATE TABLE ".table($R!=""?"adminer_$D":$D)." (\n".implode(",\n",$q)."\n)"))return
false;if($R!=""){if($Rd&&!queries("INSERT INTO ".table("adminer_$D")." (".implode(", ",$Rd).") SELECT ".implode(", ",array_map('idf_escape',array_keys($Rd)))." FROM ".table($R)))return
false;$Af=array();foreach(triggers($R)as$zf=>$of){$yf=trigger($zf);$Af[]="CREATE TRIGGER ".idf_escape($zf)." ".implode(" ",$of)." ON ".table($D)."\n$yf[Statement]";}if(!queries("DROP TABLE ".table($R)))return
false;queries("ALTER TABLE ".table("adminer_$D")." RENAME TO ".table($D));if(!alter_indexes($D,$x))return
false;foreach($Af
as$yf){if(!queries($yf))return
false;}queries("COMMIT");}return
true;}function
index_sql($R,$U,$D,$f){return"CREATE $U ".($U!="INDEX"?"INDEX ":"").idf_escape($D!=""?$D:uniqid($R."_"))." ON ".table($R)." $f";}function
alter_indexes($R,$c){foreach($c
as$fe){if($fe[0]=="PRIMARY")return
recreate_table($R,$R,array(),array(),array(),$c);}foreach(array_reverse($c)as$X){if(!queries($X[2]=="DROP"?"DROP INDEX ".idf_escape($X[1]):index_sql($R,$X[0],$X[1],"(".implode(", ",$X[2]).")")))return
false;}return
true;}function
truncate_tables($T){return
apply_queries("DELETE FROM",$T);}function
drop_views($Tf){return
apply_queries("DROP VIEW",$Tf);}function
drop_tables($T){return
apply_queries("DROP TABLE",$T);}function
move_tables($T,$Tf,$hf){return
false;}function
trigger($D){global$h;if($D=="")return
array("Statement"=>"BEGIN\n\t;\nEND");$v='(?:[^`"\\s]+|`[^`]*`|"[^"]*")+';$_f=trigger_options();preg_match("~^CREATE\\s+TRIGGER\\s*$v\\s*(".implode("|",$_f["Timing"]).")\\s+([a-z]+)(?:\\s+OF\\s+($v))?\\s+ON\\s*$v\\s*(?:FOR\\s+EACH\\s+ROW\\s)?(.*)~is",$h->result("SELECT sql FROM sqlite_master WHERE type = 'trigger' AND name = ".q($D)),$B);$Dd=$B[3];return
array("Timing"=>strtoupper($B[1]),"Event"=>strtoupper($B[2]).($Dd?" OF":""),"Of"=>($Dd[0]=='`'||$Dd[0]=='"'?idf_unescape($Dd):$Dd),"Trigger"=>$D,"Statement"=>$B[4],);}function
triggers($R){$K=array();$_f=trigger_options();foreach(get_rows("SELECT * FROM sqlite_master WHERE type = 'trigger' AND tbl_name = ".q($R))as$L){preg_match('~^CREATE\\s+TRIGGER\\s*(?:[^`"\\s]+|`[^`]*`|"[^"]*")+\\s*('.implode("|",$_f["Timing"]).')\\s*(.*)\\s+ON\\b~iU',$L["sql"],$B);$K[$L["name"]]=array($B[1],$B[2]);}return$K;}function
trigger_options(){return
array("Timing"=>array("BEFORE","AFTER","INSTEAD OF"),"Event"=>array("INSERT","UPDATE","UPDATE OF","DELETE"),"Type"=>array("FOR EACH ROW"),);}function
routine($D,$U){}function
routines(){}function
routine_languages(){}function
begin(){return
queries("BEGIN");}function
last_id(){global$h;return$h->result("SELECT LAST_INSERT_ROWID()");}function
explain($h,$I){return$h->query("EXPLAIN $I");}function
found_rows($S,$Z){}function
types(){return
array();}function
schemas(){return
array();}function
get_schema(){return"";}function
set_schema($Ee){return
true;}function
create_sql($R,$Da){global$h;$K=$h->result("SELECT sql FROM sqlite_master WHERE type IN ('table', 'view') AND name = ".q($R));foreach(indexes($R)as$D=>$w){if($D=='')continue;$K.=";\n\n".index_sql($R,$w['type'],$D,"(".implode(", ",array_map('idf_escape',$w['columns'])).")");}return$K;}function
truncate_sql($R){return"DELETE FROM ".table($R);}function
use_sql($k){}function
trigger_sql($R,$Ye){return
implode(get_vals("SELECT sql || ';;\n' FROM sqlite_master WHERE type = 'trigger' AND tbl_name = ".q($R)));}function
show_variables(){global$h;$K=array();foreach(array("auto_vacuum","cache_size","count_changes","default_cache_size","empty_result_callbacks","encoding","foreign_keys","full_column_names","fullfsync","journal_mode","journal_size_limit","legacy_file_format","locking_mode","page_size","max_page_count","read_uncommitted","recursive_triggers","reverse_unordered_selects","secure_delete","short_column_names","synchronous","temp_store","temp_store_directory","schema_version","integrity_check","quick_check")as$z)$K[$z]=$h->result("PRAGMA $z");return$K;}function
show_status(){$K=array();foreach(get_vals("PRAGMA compile_options")as$Md){list($z,$X)=explode("=",$Md,2);$K[$z]=$X;}return$K;}function
convert_field($p){}function
unconvert_field($p,$K){return$K;}function
support($Xb){return
preg_match('~^(columns|database|drop_col|dump|indexes|move_col|sql|status|table|trigger|variables|view|view_trigger)$~',$Xb);}$y="sqlite";$Cf=array("integer"=>0,"real"=>0,"numeric"=>0,"text"=>0,"blob"=>0);$Xe=array_keys($Cf);$Jf=array();$Ld=array("=","<",">","<=",">=","!=","LIKE","LIKE %%","IN","IS NULL","NOT LIKE","NOT IN","IS NOT NULL","SQL");$pc=array("hex","length","lower","round","unixepoch","upper");$rc=array("avg","count","count distinct","group_concat","max","min","sum");$Cb=array(array(),array("integer|real|numeric"=>"+/-","text"=>"||",));}$yb["pgsql"]="PostgreSQL";if(isset($_GET["pgsql"])){$de=array("PgSQL","PDO_PgSQL");define("DRIVER","pgsql");if(extension_loaded("pgsql")){class
Min_DB{var$extension="PgSQL",$_link,$_result,$_string,$_database=true,$server_info,$affected_rows,$error;function
_error($Mb,$o){if(ini_bool("html_errors"))$o=html_entity_decode(strip_tags($o));$o=preg_replace('~^[^:]*: ~','',$o);$this->error=$o;}function
connect($O,$V,$H){global$b;$m=$b->database();set_error_handler(array($this,'_error'));$this->_string="host='".str_replace(":","' port='",addcslashes($O,"'\\"))."' user='".addcslashes($V,"'\\")."' password='".addcslashes($H,"'\\")."'";$this->_link=@pg_connect("$this->_string dbname='".($m!=""?addcslashes($m,"'\\"):"postgres")."'",PGSQL_CONNECT_FORCE_NEW);if(!$this->_link&&$m!=""){$this->_database=false;$this->_link=@pg_connect("$this->_string dbname='postgres'",PGSQL_CONNECT_FORCE_NEW);}restore_error_handler();if($this->_link){$Rf=pg_version($this->_link);$this->server_info=$Rf["server"];pg_set_client_encoding($this->_link,"UTF8");}return(bool)$this->_link;}function
quote($Q){return"'".pg_escape_string($this->_link,$Q)."'";}function
select_db($k){global$b;if($k==$b->database())return$this->_database;$K=@pg_connect("$this->_string dbname='".addcslashes($k,"'\\")."'",PGSQL_CONNECT_FORCE_NEW);if($K)$this->_link=$K;return$K;}function
close(){$this->_link=@pg_connect("$this->_string dbname='postgres'");}function
query($I,$Df=false){$J=@pg_query($this->_link,$I);$this->error="";if(!$J){$this->error=pg_last_error($this->_link);return
false;}elseif(!pg_num_fields($J)){$this->affected_rows=pg_affected_rows($J);return
true;}return
new
Min_Result($J);}function
multi_query($I){return$this->_result=$this->query($I);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
result($I,$p=0){$J=$this->query($I);if(!$J||!$J->num_rows)return
false;return
pg_fetch_result($J->_result,0,$p);}}class
Min_Result{var$_result,$_offset=0,$num_rows;function
Min_Result($J){$this->_result=$J;$this->num_rows=pg_num_rows($J);}function
fetch_assoc(){return
pg_fetch_assoc($this->_result);}function
fetch_row(){return
pg_fetch_row($this->_result);}function
fetch_field(){$e=$this->_offset++;$K=new
stdClass;if(function_exists('pg_field_table'))$K->orgtable=pg_field_table($this->_result,$e);$K->name=pg_field_name($this->_result,$e);$K->orgname=$K->name;$K->type=pg_field_type($this->_result,$e);$K->charsetnr=($K->type=="bytea"?63:0);return$K;}function
__destruct(){pg_free_result($this->_result);}}}elseif(extension_loaded("pdo_pgsql")){class
Min_DB
extends
Min_PDO{var$extension="PDO_PgSQL";function
connect($O,$V,$H){global$b;$m=$b->database();$Q="pgsql:host='".str_replace(":","' port='",addcslashes($O,"'\\"))."' options='-c client_encoding=utf8'";$this->dsn("$Q dbname='".($m!=""?addcslashes($m,"'\\"):"postgres")."'",$V,$H);return
true;}function
select_db($k){global$b;return($b->database()==$k);}function
close(){}}}class
Min_Driver
extends
Min_SQL{function
insertUpdate($R,$M,$fe){global$h;foreach($M
as$P){$Kf=array();$Z=array();foreach($P
as$z=>$X){$Kf[]="$z = $X";if(isset($fe[idf_unescape($z)]))$Z[]="$z = $X";}if(!(($Z&&queries("UPDATE ".table($R)." SET ".implode(", ",$Kf)." WHERE ".implode(" AND ",$Z))&&$h->affected_rows)||queries("INSERT INTO ".table($R)." (".implode(", ",array_keys($P)).") VALUES (".implode(", ",$P).")")))return
false;}return
true;}}function
idf_escape($v){return'"'.str_replace('"','""',$v).'"';}function
table($v){return
idf_escape($v);}function
connect(){global$b;$h=new
Min_DB;$j=$b->credentials();if($h->connect($j[0],$j[1],$j[2])){if($h->server_info>=9)$h->query("SET application_name = 'Adminer'");return$h;}return$h->error;}function
get_databases(){return
get_vals("SELECT datname FROM pg_database ORDER BY datname");}function
limit($I,$Z,$_,$Ed=0,$Ke=" "){return" $I$Z".($_!==null?$Ke."LIMIT $_".($Ed?" OFFSET $Ed":""):"");}function
limit1($I,$Z){return" $I$Z";}function
db_collation($m,$Za){global$h;return$h->result("SHOW LC_COLLATE");}function
engines(){return
array();}function
logged_user(){global$h;return$h->result("SELECT user");}function
tables_list(){return
get_key_vals("SELECT table_name, table_type FROM information_schema.tables WHERE table_schema = current_schema() ORDER BY table_name");}function
count_tables($l){return
array();}function
table_status($D=""){$K=array();foreach(get_rows("SELECT relname AS \"Name\", CASE relkind WHEN 'r' THEN 'table' ELSE 'view' END AS \"Engine\", pg_relation_size(oid) AS \"Data_length\", pg_total_relation_size(oid) - pg_relation_size(oid) AS \"Index_length\", obj_description(oid, 'pg_class') AS \"Comment\", relhasoids::int AS \"Oid\", reltuples as \"Rows\"
FROM pg_class
WHERE relkind IN ('r','v')
AND relnamespace = (SELECT oid FROM pg_namespace WHERE nspname = current_schema())
".($D!=""?"AND relname = ".q($D):"ORDER BY relname"))as$L)$K[$L["Name"]]=$L;return($D!=""?$K[$D]:$K);}function
is_view($S){return$S["Engine"]=="view";}function
fk_support($S){return
true;}function
fields($R){$K=array();$va=array('timestamp without time zone'=>'timestamp','timestamp with time zone'=>'timestamptz',);foreach(get_rows("SELECT a.attname AS field, format_type(a.atttypid, a.atttypmod) AS full_type, d.adsrc AS default, a.attnotnull::int, col_description(c.oid, a.attnum) AS comment
FROM pg_class c
JOIN pg_namespace n ON c.relnamespace = n.oid
JOIN pg_attribute a ON c.oid = a.attrelid
LEFT JOIN pg_attrdef d ON c.oid = d.adrelid AND a.attnum = d.adnum
WHERE c.relname = ".q($R)."
AND n.nspname = current_schema()
AND NOT a.attisdropped
AND a.attnum > 0
ORDER BY a.attnum")as$L){preg_match('~([^([]+)(\((.*)\))?((\[[0-9]*])*)$~',$L["full_type"],$B);list(,$U,$ed,$L["length"],$xa)=$B;$L["length"].=$xa;$L["type"]=($va[$U]?$va[$U]:$U);$L["full_type"]=$L["type"].$ed.$xa;$L["null"]=!$L["attnotnull"];$L["auto_increment"]=preg_match('~^nextval\\(~i',$L["default"]);$L["privileges"]=array("insert"=>1,"select"=>1,"update"=>1);if(preg_match('~(.+)::[^)]+(.*)~',$L["default"],$B))$L["default"]=($B[1][0]=="'"?idf_unescape($B[1]):$B[1]).$B[2];$K[$L["field"]]=$L;}return$K;}function
indexes($R,$i=null){global$h;if(!is_object($i))$i=$h;$K=array();$ff=$i->result("SELECT oid FROM pg_class WHERE relnamespace = (SELECT oid FROM pg_namespace WHERE nspname = current_schema()) AND relname = ".q($R));$f=get_key_vals("SELECT attnum, attname FROM pg_attribute WHERE attrelid = $ff AND attnum > 0",$i);foreach(get_rows("SELECT relname, indisunique::int, indisprimary::int, indkey, indoption FROM pg_index i, pg_class ci WHERE i.indrelid = $ff AND ci.oid = i.indexrelid",$i)as$L){$ue=$L["relname"];$K[$ue]["type"]=($L["indisprimary"]?"PRIMARY":($L["indisunique"]?"UNIQUE":"INDEX"));$K[$ue]["columns"]=array();foreach(explode(" ",$L["indkey"])as$Gc)$K[$ue]["columns"][]=$f[$Gc];$K[$ue]["descs"]=array();foreach(explode(" ",$L["indoption"])as$Hc)$K[$ue]["descs"][]=($Hc&1?'1':null);$K[$ue]["lengths"]=array();}return$K;}function
foreign_keys($R){global$Gd;$K=array();foreach(get_rows("SELECT conname, pg_get_constraintdef(oid) AS definition
FROM pg_constraint
WHERE conrelid = (SELECT pc.oid FROM pg_class AS pc INNER JOIN pg_namespace AS pn ON (pn.oid = pc.relnamespace) WHERE pc.relname = ".q($R)." AND pn.nspname = current_schema())
AND contype = 'f'::char
ORDER BY conkey, conname")as$L){if(preg_match('~FOREIGN KEY\s*\((.+)\)\s*REFERENCES (.+)\((.+)\)(.*)$~iA',$L['definition'],$B)){$L['source']=array_map('trim',explode(',',$B[1]));if(preg_match('~^(("([^"]|"")+"|[^"]+)\.)?"?("([^"]|"")+"|[^"]+)$~',$B[2],$ld)){$L['ns']=str_replace('""','"',preg_replace('~^"(.+)"$~','\1',$ld[2]));$L['table']=str_replace('""','"',preg_replace('~^"(.+)"$~','\1',$ld[4]));}$L['target']=array_map('trim',explode(',',$B[3]));$L['on_delete']=(preg_match("~ON DELETE ($Gd)~",$B[4],$ld)?$ld[1]:'NO ACTION');$L['on_update']=(preg_match("~ON UPDATE ($Gd)~",$B[4],$ld)?$ld[1]:'NO ACTION');$K[$L['conname']]=$L;}}return$K;}function
view($D){global$h;return
array("select"=>$h->result("SELECT pg_get_viewdef(".q($D).")"));}function
collations(){return
array();}function
information_schema($m){return($m=="information_schema");}function
error(){global$h;$K=h($h->error);if(preg_match('~^(.*\\n)?([^\\n]*)\\n( *)\\^(\\n.*)?$~s',$K,$B))$K=$B[1].preg_replace('~((?:[^&]|&[^;]*;){'.strlen($B[3]).'})(.*)~','\\1<b>\\2</b>',$B[2]).$B[4];return
nl_br($K);}function
create_database($m,$d){return
queries("CREATE DATABASE ".idf_escape($m).($d?" ENCODING ".idf_escape($d):""));}function
drop_databases($l){global$h;$h->close();return
apply_queries("DROP DATABASE",$l,'idf_escape');}function
rename_database($D,$d){return
queries("ALTER DATABASE ".idf_escape(DB)." RENAME TO ".idf_escape($D));}function
auto_increment(){return"";}function
alter_table($R,$D,$q,$ec,$cb,$Jb,$d,$Da,$Wd){$c=array();$me=array();foreach($q
as$p){$e=idf_escape($p[0]);$X=$p[1];if(!$X)$c[]="DROP $e";else{$Of=$X[5];unset($X[5]);if(isset($X[6])&&$p[0]=="")$X[1]=($X[1]=="bigint"?" big":" ")."serial";if($p[0]=="")$c[]=($R!=""?"ADD ":"  ").implode($X);else{if($e!=$X[0])$me[]="ALTER TABLE ".table($R)." RENAME $e TO $X[0]";$c[]="ALTER $e TYPE$X[1]";if(!$X[6]){$c[]="ALTER $e ".($X[3]?"SET$X[3]":"DROP DEFAULT");$c[]="ALTER $e ".($X[2]==" NULL"?"DROP NOT":"SET").$X[2];}}if($p[0]!=""||$Of!="")$me[]="COMMENT ON COLUMN ".table($R).".$X[0] IS ".($Of!=""?substr($Of,9):"''");}}$c=array_merge($c,$ec);if($R=="")array_unshift($me,"CREATE TABLE ".table($D)." (\n".implode(",\n",$c)."\n)");elseif($c)array_unshift($me,"ALTER TABLE ".table($R)."\n".implode(",\n",$c));if($R!=""&&$R!=$D)$me[]="ALTER TABLE ".table($R)." RENAME TO ".table($D);if($R!=""||$cb!="")$me[]="COMMENT ON TABLE ".table($D)." IS ".q($cb);if($Da!=""){}foreach($me
as$I){if(!queries($I))return
false;}return
true;}function
alter_indexes($R,$c){$jb=array();$zb=array();$me=array();foreach($c
as$X){if($X[0]!="INDEX")$jb[]=($X[2]=="DROP"?"\nDROP CONSTRAINT ".idf_escape($X[1]):"\nADD".($X[1]!=""?" CONSTRAINT ".idf_escape($X[1]):"")." $X[0] ".($X[0]=="PRIMARY"?"KEY ":"")."(".implode(", ",$X[2]).")");elseif($X[2]=="DROP")$zb[]=idf_escape($X[1]);else$me[]="CREATE INDEX ".idf_escape($X[1]!=""?$X[1]:uniqid($R."_"))." ON ".table($R)." (".implode(", ",$X[2]).")";}if($jb)array_unshift($me,"ALTER TABLE ".table($R).implode(",",$jb));if($zb)array_unshift($me,"DROP INDEX ".implode(", ",$zb));foreach($me
as$I){if(!queries($I))return
false;}return
true;}function
truncate_tables($T){return
queries("TRUNCATE ".implode(", ",array_map('table',$T)));return
true;}function
drop_views($Tf){return
queries("DROP VIEW ".implode(", ",array_map('table',$Tf)));}function
drop_tables($T){return
queries("DROP TABLE ".implode(", ",array_map('table',$T)));}function
move_tables($T,$Tf,$hf){foreach($T
as$R){if(!queries("ALTER TABLE ".table($R)." SET SCHEMA ".idf_escape($hf)))return
false;}foreach($Tf
as$R){if(!queries("ALTER VIEW ".table($R)." SET SCHEMA ".idf_escape($hf)))return
false;}return
true;}function
trigger($D){if($D=="")return
array("Statement"=>"EXECUTE PROCEDURE ()");$M=get_rows('SELECT trigger_name AS "Trigger", condition_timing AS "Timing", event_manipulation AS "Event", \'FOR EACH \' || action_orientation AS "Type", action_statement AS "Statement" FROM information_schema.triggers WHERE event_object_table = '.q($_GET["trigger"]).' AND trigger_name = '.q($D));return
reset($M);}function
triggers($R){$K=array();foreach(get_rows("SELECT * FROM information_schema.triggers WHERE event_object_table = ".q($R))as$L)$K[$L["trigger_name"]]=array($L["condition_timing"],$L["event_manipulation"]);return$K;}function
trigger_options(){return
array("Timing"=>array("BEFORE","AFTER"),"Event"=>array("INSERT","UPDATE","DELETE"),"Type"=>array("FOR EACH ROW","FOR EACH STATEMENT"),);}function
routines(){return
get_rows('SELECT p.proname AS "ROUTINE_NAME", p.proargtypes AS "ROUTINE_TYPE", pg_catalog.format_type(p.prorettype, NULL) AS "DTD_IDENTIFIER"
FROM pg_catalog.pg_namespace n
JOIN pg_catalog.pg_proc p ON p.pronamespace = n.oid
WHERE n.nspname = current_schema()
ORDER BY p.proname');}function
routine_languages(){return
get_vals("SELECT langname FROM pg_catalog.pg_language");}function
last_id(){return
0;}function
explain($h,$I){return$h->query("EXPLAIN $I");}function
found_rows($S,$Z){global$h;if(preg_match("~ rows=([0-9]+)~",$h->result("EXPLAIN SELECT * FROM ".idf_escape($S["Name"]).($Z?" WHERE ".implode(" AND ",$Z):"")),$te))return$te[1];return
false;}function
types(){return
get_vals("SELECT typname
FROM pg_type
WHERE typnamespace = (SELECT oid FROM pg_namespace WHERE nspname = current_schema())
AND typtype IN ('b','d','e')
AND typelem = 0");}function
schemas(){return
get_vals("SELECT nspname FROM pg_namespace ORDER BY nspname");}function
get_schema(){global$h;return$h->result("SELECT current_schema()");}function
set_schema($De){global$h,$Cf,$Xe;$K=$h->query("SET search_path TO ".idf_escape($De));foreach(types()as$U){if(!isset($Cf[$U])){$Cf[$U]=0;$Xe[lang(23)][]=$U;}}return$K;}function
use_sql($k){return"\connect ".idf_escape($k);}function
show_variables(){return
get_key_vals("SHOW ALL");}function
process_list(){global$h;return
get_rows("SELECT * FROM pg_stat_activity ORDER BY ".($h->server_info<9.2?"procpid":"pid"));}function
show_status(){}function
convert_field($p){}function
unconvert_field($p,$K){return$K;}function
support($Xb){return
preg_match('~^(database|table|columns|sql|indexes|comment|view|scheme|processlist|sequence|trigger|type|variables|drop_col)$~',$Xb);}$y="pgsql";$Cf=array();$Xe=array();foreach(array(lang(24)=>array("smallint"=>5,"integer"=>10,"bigint"=>19,"boolean"=>1,"numeric"=>0,"real"=>7,"double precision"=>16,"money"=>20),lang(25)=>array("date"=>13,"time"=>17,"timestamp"=>20,"timestamptz"=>21,"interval"=>0),lang(26)=>array("character"=>0,"character varying"=>0,"text"=>0,"tsquery"=>0,"tsvector"=>0,"uuid"=>0,"xml"=>0),lang(27)=>array("bit"=>0,"bit varying"=>0,"bytea"=>0),lang(28)=>array("cidr"=>43,"inet"=>43,"macaddr"=>17,"txid_snapshot"=>0),lang(29)=>array("box"=>0,"circle"=>0,"line"=>0,"lseg"=>0,"path"=>0,"point"=>0,"polygon"=>0),)as$z=>$X){$Cf+=$X;$Xe[$z]=array_keys($X);}$Jf=array();$Ld=array("=","<",">","<=",">=","!=","~","!~","LIKE","LIKE %%","IN","IS NULL","NOT LIKE","NOT IN","IS NOT NULL");$pc=array("char_length","lower","round","to_hex","to_timestamp","upper");$rc=array("avg","count","count distinct","max","min","sum");$Cb=array(array("char"=>"md5","date|time"=>"now",),array("int|numeric|real|money"=>"+/-","date|time"=>"+ interval/- interval","char|text"=>"||",));}$yb["oracle"]="Oracle";if(isset($_GET["oracle"])){$de=array("OCI8","PDO_OCI");define("DRIVER","oracle");if(extension_loaded("oci8")){class
Min_DB{var$extension="oci8",$_link,$_result,$server_info,$affected_rows,$errno,$error;function
_error($Mb,$o){if(ini_bool("html_errors"))$o=html_entity_decode(strip_tags($o));$o=preg_replace('~^[^:]*: ~','',$o);$this->error=$o;}function
connect($O,$V,$H){$this->_link=@oci_new_connect($V,$H,$O,"AL32UTF8");if($this->_link){$this->server_info=oci_server_version($this->_link);return
true;}$o=oci_error();$this->error=$o["message"];return
false;}function
quote($Q){return"'".str_replace("'","''",$Q)."'";}function
select_db($k){return
true;}function
query($I,$Df=false){$J=oci_parse($this->_link,$I);$this->error="";if(!$J){$o=oci_error($this->_link);$this->errno=$o["code"];$this->error=$o["message"];return
false;}set_error_handler(array($this,'_error'));$K=@oci_execute($J);restore_error_handler();if($K){if(oci_num_fields($J))return
new
Min_Result($J);$this->affected_rows=oci_num_rows($J);}return$K;}function
multi_query($I){return$this->_result=$this->query($I);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
result($I,$p=1){$J=$this->query($I);if(!is_object($J)||!oci_fetch($J->_result))return
false;return
oci_result($J->_result,$p);}}class
Min_Result{var$_result,$_offset=1,$num_rows;function
Min_Result($J){$this->_result=$J;}function
_convert($L){foreach((array)$L
as$z=>$X){if(is_a($X,'OCI-Lob'))$L[$z]=$X->load();}return$L;}function
fetch_assoc(){return$this->_convert(oci_fetch_assoc($this->_result));}function
fetch_row(){return$this->_convert(oci_fetch_row($this->_result));}function
fetch_field(){$e=$this->_offset++;$K=new
stdClass;$K->name=oci_field_name($this->_result,$e);$K->orgname=$K->name;$K->type=oci_field_type($this->_result,$e);$K->charsetnr=(preg_match("~raw|blob|bfile~",$K->type)?63:0);return$K;}function
__destruct(){oci_free_statement($this->_result);}}}elseif(extension_loaded("pdo_oci")){class
Min_DB
extends
Min_PDO{var$extension="PDO_OCI";function
connect($O,$V,$H){$this->dsn("oci:dbname=//$O;charset=AL32UTF8",$V,$H);return
true;}function
select_db($k){return
true;}}}class
Min_Driver
extends
Min_SQL{function
begin(){return
true;}}function
idf_escape($v){return'"'.str_replace('"','""',$v).'"';}function
table($v){return
idf_escape($v);}function
connect(){global$b;$h=new
Min_DB;$j=$b->credentials();if($h->connect($j[0],$j[1],$j[2]))return$h;return$h->error;}function
get_databases(){return
get_vals("SELECT tablespace_name FROM user_tablespaces");}function
limit($I,$Z,$_,$Ed=0,$Ke=" "){return($Ed?" * FROM (SELECT t.*, rownum AS rnum FROM (SELECT $I$Z) t WHERE rownum <= ".($_+$Ed).") WHERE rnum > $Ed":($_!==null?" * FROM (SELECT $I$Z) WHERE rownum <= ".($_+$Ed):" $I$Z"));}function
limit1($I,$Z){return" $I$Z";}function
db_collation($m,$Za){global$h;return$h->result("SELECT value FROM nls_database_parameters WHERE parameter = 'NLS_CHARACTERSET'");}function
engines(){return
array();}function
logged_user(){global$h;return$h->result("SELECT USER FROM DUAL");}function
tables_list(){return
get_key_vals("SELECT table_name, 'table' FROM all_tables WHERE tablespace_name = ".q(DB)."
UNION SELECT view_name, 'view' FROM user_views
ORDER BY 1");}function
count_tables($l){return
array();}function
table_status($D=""){$K=array();$Fe=q($D);foreach(get_rows('SELECT table_name "Name", \'table\' "Engine", avg_row_len * num_rows "Data_length", num_rows "Rows" FROM all_tables WHERE tablespace_name = '.q(DB).($D!=""?" AND table_name = $Fe":"")."
UNION SELECT view_name, 'view', 0, 0 FROM user_views".($D!=""?" WHERE view_name = $Fe":"")."
ORDER BY 1")as$L){if($D!="")return$L;$K[$L["Name"]]=$L;}return$K;}function
is_view($S){return$S["Engine"]=="view";}function
fk_support($S){return
true;}function
fields($R){$K=array();foreach(get_rows("SELECT * FROM all_tab_columns WHERE table_name = ".q($R)." ORDER BY column_id")as$L){$U=$L["DATA_TYPE"];$ed="$L[DATA_PRECISION],$L[DATA_SCALE]";if($ed==",")$ed=$L["DATA_LENGTH"];$K[$L["COLUMN_NAME"]]=array("field"=>$L["COLUMN_NAME"],"full_type"=>$U.($ed?"($ed)":""),"type"=>strtolower($U),"length"=>$ed,"default"=>$L["DATA_DEFAULT"],"null"=>($L["NULLABLE"]=="Y"),"privileges"=>array("insert"=>1,"select"=>1,"update"=>1),);}return$K;}function
indexes($R,$i=null){$K=array();foreach(get_rows("SELECT uic.*, uc.constraint_type
FROM user_ind_columns uic
LEFT JOIN user_constraints uc ON uic.index_name = uc.constraint_name AND uic.table_name = uc.table_name
WHERE uic.table_name = ".q($R)."
ORDER BY uc.constraint_type, uic.column_position",$i)as$L){$Ec=$L["INDEX_NAME"];$K[$Ec]["type"]=($L["CONSTRAINT_TYPE"]=="P"?"PRIMARY":($L["CONSTRAINT_TYPE"]=="U"?"UNIQUE":"INDEX"));$K[$Ec]["columns"][]=$L["COLUMN_NAME"];$K[$Ec]["lengths"][]=($L["CHAR_LENGTH"]&&$L["CHAR_LENGTH"]!=$L["COLUMN_LENGTH"]?$L["CHAR_LENGTH"]:null);$K[$Ec]["descs"][]=($L["DESCEND"]?'1':null);}return$K;}function
view($D){$M=get_rows('SELECT text "select" FROM user_views WHERE view_name = '.q($D));return
reset($M);}function
collations(){return
array();}function
information_schema($m){return
false;}function
error(){global$h;return
h($h->error);}function
explain($h,$I){$h->query("EXPLAIN PLAN FOR $I");return$h->query("SELECT * FROM plan_table");}function
found_rows($S,$Z){}function
alter_table($R,$D,$q,$ec,$cb,$Jb,$d,$Da,$Wd){$c=$zb=array();foreach($q
as$p){$X=$p[1];if($X&&$p[0]!=""&&idf_escape($p[0])!=$X[0])queries("ALTER TABLE ".table($R)." RENAME COLUMN ".idf_escape($p[0])." TO $X[0]");if($X)$c[]=($R!=""?($p[0]!=""?"MODIFY (":"ADD ("):"  ").implode($X).($R!=""?")":"");else$zb[]=idf_escape($p[0]);}if($R=="")return
queries("CREATE TABLE ".table($D)." (\n".implode(",\n",$c)."\n)");return(!$c||queries("ALTER TABLE ".table($R)."\n".implode("\n",$c)))&&(!$zb||queries("ALTER TABLE ".table($R)." DROP (".implode(", ",$zb).")"))&&($R==$D||queries("ALTER TABLE ".table($R)." RENAME TO ".table($D)));}function
foreign_keys($R){return
array();}function
truncate_tables($T){return
apply_queries("TRUNCATE TABLE",$T);}function
drop_views($Tf){return
apply_queries("DROP VIEW",$Tf);}function
drop_tables($T){return
apply_queries("DROP TABLE",$T);}function
last_id(){return
0;}function
schemas(){return
get_vals("SELECT DISTINCT owner FROM dba_segments WHERE owner IN (SELECT username FROM dba_users WHERE default_tablespace NOT IN ('SYSTEM','SYSAUX'))");}function
get_schema(){global$h;return$h->result("SELECT sys_context('USERENV', 'SESSION_USER') FROM dual");}function
set_schema($Ee){global$h;return$h->query("ALTER SESSION SET CURRENT_SCHEMA = ".idf_escape($Ee));}function
show_variables(){return
get_key_vals('SELECT name, display_value FROM v$parameter');}function
process_list(){return
get_rows('SELECT sess.process AS "process", sess.username AS "user", sess.schemaname AS "schema", sess.status AS "status", sess.wait_class AS "wait_class", sess.seconds_in_wait AS "seconds_in_wait", sql.sql_text AS "sql_text", sess.machine AS "machine", sess.port AS "port"
FROM v$session sess LEFT OUTER JOIN v$sql sql
ON sql.sql_id = sess.sql_id
WHERE sess.type = \'USER\'
ORDER BY PROCESS
');}function
show_status(){$M=get_rows('SELECT * FROM v$instance');return
reset($M);}function
convert_field($p){}function
unconvert_field($p,$K){return$K;}function
support($Xb){return
preg_match('~^(columns|database|drop_col|indexes|processlist|scheme|sql|status|table|variables|view|view_trigger)$~',$Xb);}$y="oracle";$Cf=array();$Xe=array();foreach(array(lang(24)=>array("number"=>38,"binary_float"=>12,"binary_double"=>21),lang(25)=>array("date"=>10,"timestamp"=>29,"interval year"=>12,"interval day"=>28),lang(26)=>array("char"=>2000,"varchar2"=>4000,"nchar"=>2000,"nvarchar2"=>4000,"clob"=>4294967295,"nclob"=>4294967295),lang(27)=>array("raw"=>2000,"long raw"=>2147483648,"blob"=>4294967295,"bfile"=>4294967296),)as$z=>$X){$Cf+=$X;$Xe[$z]=array_keys($X);}$Jf=array();$Ld=array("=","<",">","<=",">=","!=","LIKE","LIKE %%","IN","IS NULL","NOT LIKE","NOT REGEXP","NOT IN","IS NOT NULL","SQL");$pc=array("length","lower","round","upper");$rc=array("avg","count","count distinct","max","min","sum");$Cb=array(array("date"=>"current_date","timestamp"=>"current_timestamp",),array("number|float|double"=>"+/-","date|timestamp"=>"+ interval/- interval","char|clob"=>"||",));}$yb["mssql"]="MS SQL";if(isset($_GET["mssql"])){$de=array("SQLSRV","MSSQL");define("DRIVER","mssql");if(extension_loaded("sqlsrv")){class
Min_DB{var$extension="sqlsrv",$_link,$_result,$server_info,$affected_rows,$errno,$error;function
_get_error(){$this->error="";foreach(sqlsrv_errors()as$o){$this->errno=$o["code"];$this->error.="$o[message]\n";}$this->error=rtrim($this->error);}function
connect($O,$V,$H){$this->_link=@sqlsrv_connect($O,array("UID"=>$V,"PWD"=>$H,"CharacterSet"=>"UTF-8"));if($this->_link){$Ic=sqlsrv_server_info($this->_link);$this->server_info=$Ic['SQLServerVersion'];}else$this->_get_error();return(bool)$this->_link;}function
quote($Q){return"'".str_replace("'","''",$Q)."'";}function
select_db($k){return$this->query("USE ".idf_escape($k));}function
query($I,$Df=false){$J=sqlsrv_query($this->_link,$I);$this->error="";if(!$J){$this->_get_error();return
false;}return$this->store_result($J);}function
multi_query($I){$this->_result=sqlsrv_query($this->_link,$I);$this->error="";if(!$this->_result){$this->_get_error();return
false;}return
true;}function
store_result($J=null){if(!$J)$J=$this->_result;if(sqlsrv_field_metadata($J))return
new
Min_Result($J);$this->affected_rows=sqlsrv_rows_affected($J);return
true;}function
next_result(){return
sqlsrv_next_result($this->_result);}function
result($I,$p=0){$J=$this->query($I);if(!is_object($J))return
false;$L=$J->fetch_row();return$L[$p];}}class
Min_Result{var$_result,$_offset=0,$_fields,$num_rows;function
Min_Result($J){$this->_result=$J;}function
_convert($L){foreach((array)$L
as$z=>$X){if(is_a($X,'DateTime'))$L[$z]=$X->format("Y-m-d H:i:s");}return$L;}function
fetch_assoc(){return$this->_convert(sqlsrv_fetch_array($this->_result,SQLSRV_FETCH_ASSOC,SQLSRV_SCROLL_NEXT));}function
fetch_row(){return$this->_convert(sqlsrv_fetch_array($this->_result,SQLSRV_FETCH_NUMERIC,SQLSRV_SCROLL_NEXT));}function
fetch_field(){if(!$this->_fields)$this->_fields=sqlsrv_field_metadata($this->_result);$p=$this->_fields[$this->_offset++];$K=new
stdClass;$K->name=$p["Name"];$K->orgname=$p["Name"];$K->type=($p["Type"]==1?254:0);return$K;}function
seek($Ed){for($t=0;$t<$Ed;$t++)sqlsrv_fetch($this->_result);}function
__destruct(){sqlsrv_free_stmt($this->_result);}}}elseif(extension_loaded("mssql")){class
Min_DB{var$extension="MSSQL",$_link,$_result,$server_info,$affected_rows,$error;function
connect($O,$V,$H){$this->_link=@mssql_connect($O,$V,$H);if($this->_link){$J=$this->query("SELECT SERVERPROPERTY('ProductLevel'), SERVERPROPERTY('Edition')");$L=$J->fetch_row();$this->server_info=$this->result("sp_server_info 2",2)." [$L[0]] $L[1]";}else$this->error=mssql_get_last_message();return(bool)$this->_link;}function
quote($Q){return"'".str_replace("'","''",$Q)."'";}function
select_db($k){return
mssql_select_db($k);}function
query($I,$Df=false){$J=mssql_query($I,$this->_link);$this->error="";if(!$J){$this->error=mssql_get_last_message();return
false;}if($J===true){$this->affected_rows=mssql_rows_affected($this->_link);return
true;}return
new
Min_Result($J);}function
multi_query($I){return$this->_result=$this->query($I);}function
store_result(){return$this->_result;}function
next_result(){return
mssql_next_result($this->_result);}function
result($I,$p=0){$J=$this->query($I);if(!is_object($J))return
false;return
mssql_result($J->_result,0,$p);}}class
Min_Result{var$_result,$_offset=0,$_fields,$num_rows;function
Min_Result($J){$this->_result=$J;$this->num_rows=mssql_num_rows($J);}function
fetch_assoc(){return
mssql_fetch_assoc($this->_result);}function
fetch_row(){return
mssql_fetch_row($this->_result);}function
num_rows(){return
mssql_num_rows($this->_result);}function
fetch_field(){$K=mssql_fetch_field($this->_result);$K->orgtable=$K->table;$K->orgname=$K->name;return$K;}function
seek($Ed){mssql_data_seek($this->_result,$Ed);}function
__destruct(){mssql_free_result($this->_result);}}}class
Min_Driver
extends
Min_SQL{function
insertUpdate($R,$M,$fe){foreach($M
as$P){$Kf=array();$Z=array();foreach($P
as$z=>$X){$Kf[]="$z = $X";if(isset($fe[idf_unescape($z)]))$Z[]="$z = $X";}if(!queries("MERGE ".table($R)." USING (VALUES(".implode(", ",$P).")) AS source (c".implode(", c",range(1,count($P))).") ON ".implode(" AND ",$Z)." WHEN MATCHED THEN UPDATE SET ".implode(", ",$Kf)." WHEN NOT MATCHED THEN INSERT (".implode(", ",array_keys($P)).") VALUES (".implode(", ",$P).");"))return
false;}return
true;}function
begin(){return
queries("BEGIN TRANSACTION");}}function
idf_escape($v){return"[".str_replace("]","]]",$v)."]";}function
table($v){return($_GET["ns"]!=""?idf_escape($_GET["ns"]).".":"").idf_escape($v);}function
connect(){global$b;$h=new
Min_DB;$j=$b->credentials();if($h->connect($j[0],$j[1],$j[2]))return$h;return$h->error;}function
get_databases(){return
get_vals("EXEC sp_databases");}function
limit($I,$Z,$_,$Ed=0,$Ke=" "){return($_!==null?" TOP (".($_+$Ed).")":"")." $I$Z";}function
limit1($I,$Z){return
limit($I,$Z,1);}function
db_collation($m,$Za){global$h;return$h->result("SELECT collation_name FROM sys.databases WHERE name =  ".q($m));}function
engines(){return
array();}function
logged_user(){global$h;return$h->result("SELECT SUSER_NAME()");}function
tables_list(){return
get_key_vals("SELECT name, type_desc FROM sys.all_objects WHERE schema_id = SCHEMA_ID(".q(get_schema()).") AND type IN ('S', 'U', 'V') ORDER BY name");}function
count_tables($l){global$h;$K=array();foreach($l
as$m){$h->select_db($m);$K[$m]=$h->result("SELECT COUNT(*) FROM INFORMATION_SCHEMA.TABLES");}return$K;}function
table_status($D=""){$K=array();foreach(get_rows("SELECT name AS Name, type_desc AS Engine FROM sys.all_objects WHERE schema_id = SCHEMA_ID(".q(get_schema()).") AND type IN ('S', 'U', 'V') ".($D!=""?"AND name = ".q($D):"ORDER BY name"))as$L){if($D!="")return$L;$K[$L["Name"]]=$L;}return$K;}function
is_view($S){return$S["Engine"]=="VIEW";}function
fk_support($S){return
true;}function
fields($R){$K=array();foreach(get_rows("SELECT c.*, t.name type, d.definition [default]
FROM sys.all_columns c
JOIN sys.all_objects o ON c.object_id = o.object_id
JOIN sys.types t ON c.user_type_id = t.user_type_id
LEFT JOIN sys.default_constraints d ON c.default_object_id = d.parent_column_id
WHERE o.schema_id = SCHEMA_ID(".q(get_schema()).") AND o.type IN ('S', 'U', 'V') AND o.name = ".q($R))as$L){$U=$L["type"];$ed=(preg_match("~char|binary~",$U)?$L["max_length"]:($U=="decimal"?"$L[precision],$L[scale]":""));$K[$L["name"]]=array("field"=>$L["name"],"full_type"=>$U.($ed?"($ed)":""),"type"=>$U,"length"=>$ed,"default"=>$L["default"],"null"=>$L["is_nullable"],"auto_increment"=>$L["is_identity"],"collation"=>$L["collation_name"],"privileges"=>array("insert"=>1,"select"=>1,"update"=>1),"primary"=>$L["is_identity"],);}return$K;}function
indexes($R,$i=null){$K=array();foreach(get_rows("SELECT i.name, key_ordinal, is_unique, is_primary_key, c.name AS column_name, is_descending_key
FROM sys.indexes i
INNER JOIN sys.index_columns ic ON i.object_id = ic.object_id AND i.index_id = ic.index_id
INNER JOIN sys.columns c ON ic.object_id = c.object_id AND ic.column_id = c.column_id
WHERE OBJECT_NAME(i.object_id) = ".q($R),$i)as$L){$D=$L["name"];$K[$D]["type"]=($L["is_primary_key"]?"PRIMARY":($L["is_unique"]?"UNIQUE":"INDEX"));$K[$D]["lengths"]=array();$K[$D]["columns"][$L["key_ordinal"]]=$L["column_name"];$K[$D]["descs"][$L["key_ordinal"]]=($L["is_descending_key"]?'1':null);}return$K;}function
view($D){global$h;return
array("select"=>preg_replace('~^(?:[^[]|\\[[^]]*])*\\s+AS\\s+~isU','',$h->result("SELECT VIEW_DEFINITION FROM INFORMATION_SCHEMA.VIEWS WHERE TABLE_SCHEMA = SCHEMA_NAME() AND TABLE_NAME = ".q($D))));}function
collations(){$K=array();foreach(get_vals("SELECT name FROM fn_helpcollations()")as$d)$K[preg_replace('~_.*~','',$d)][]=$d;return$K;}function
information_schema($m){return
false;}function
error(){global$h;return
nl_br(h(preg_replace('~^(\\[[^]]*])+~m','',$h->error)));}function
create_database($m,$d){return
queries("CREATE DATABASE ".idf_escape($m).(preg_match('~^[a-z0-9_]+$~i',$d)?" COLLATE $d":""));}function
drop_databases($l){return
queries("DROP DATABASE ".implode(", ",array_map('idf_escape',$l)));}function
rename_database($D,$d){if(preg_match('~^[a-z0-9_]+$~i',$d))queries("ALTER DATABASE ".idf_escape(DB)." COLLATE $d");queries("ALTER DATABASE ".idf_escape(DB)." MODIFY NAME = ".idf_escape($D));return
true;}function
auto_increment(){return" IDENTITY".($_POST["Auto_increment"]!=""?"(".(+$_POST["Auto_increment"]).",1)":"")." PRIMARY KEY";}function
alter_table($R,$D,$q,$ec,$cb,$Jb,$d,$Da,$Wd){$c=array();foreach($q
as$p){$e=idf_escape($p[0]);$X=$p[1];if(!$X)$c["DROP"][]=" COLUMN $e";else{$X[1]=preg_replace("~( COLLATE )'(\\w+)'~","\\1\\2",$X[1]);if($p[0]=="")$c["ADD"][]="\n  ".implode("",$X).($R==""?substr($ec[$X[0]],16+strlen($X[0])):"");else{unset($X[6]);if($e!=$X[0])queries("EXEC sp_rename ".q(table($R).".$e").", ".q(idf_unescape($X[0])).", 'COLUMN'");$c["ALTER COLUMN ".implode("",$X)][]="";}}}if($R=="")return
queries("CREATE TABLE ".table($D)." (".implode(",",(array)$c["ADD"])."\n)");if($R!=$D)queries("EXEC sp_rename ".q(table($R)).", ".q($D));if($ec)$c[""]=$ec;foreach($c
as$z=>$X){if(!queries("ALTER TABLE ".idf_escape($D)." $z".implode(",",$X)))return
false;}return
true;}function
alter_indexes($R,$c){$w=array();$zb=array();foreach($c
as$X){if($X[2]=="DROP"){if($X[0]=="PRIMARY")$zb[]=idf_escape($X[1]);else$w[]=idf_escape($X[1])." ON ".table($R);}elseif(!queries(($X[0]!="PRIMARY"?"CREATE $X[0] ".($X[0]!="INDEX"?"INDEX ":"").idf_escape($X[1]!=""?$X[1]:uniqid($R."_"))." ON ".table($R):"ALTER TABLE ".table($R)." ADD PRIMARY KEY")." (".implode(", ",$X[2]).")"))return
false;}return(!$w||queries("DROP INDEX ".implode(", ",$w)))&&(!$zb||queries("ALTER TABLE ".table($R)." DROP ".implode(", ",$zb)));}function
last_id(){global$h;return$h->result("SELECT SCOPE_IDENTITY()");}function
explain($h,$I){$h->query("SET SHOWPLAN_ALL ON");$K=$h->query($I);$h->query("SET SHOWPLAN_ALL OFF");return$K;}function
found_rows($S,$Z){}function
foreign_keys($R){$K=array();foreach(get_rows("EXEC sp_fkeys @fktable_name = ".q($R))as$L){$hc=&$K[$L["FK_NAME"]];$hc["table"]=$L["PKTABLE_NAME"];$hc["source"][]=$L["FKCOLUMN_NAME"];$hc["target"][]=$L["PKCOLUMN_NAME"];}return$K;}function
truncate_tables($T){return
apply_queries("TRUNCATE TABLE",$T);}function
drop_views($Tf){return
queries("DROP VIEW ".implode(", ",array_map('table',$Tf)));}function
drop_tables($T){return
queries("DROP TABLE ".implode(", ",array_map('table',$T)));}function
move_tables($T,$Tf,$hf){return
apply_queries("ALTER SCHEMA ".idf_escape($hf)." TRANSFER",array_merge($T,$Tf));}function
trigger($D){if($D=="")return
array();$M=get_rows("SELECT s.name [Trigger],
CASE WHEN OBJECTPROPERTY(s.id, 'ExecIsInsertTrigger') = 1 THEN 'INSERT' WHEN OBJECTPROPERTY(s.id, 'ExecIsUpdateTrigger') = 1 THEN 'UPDATE' WHEN OBJECTPROPERTY(s.id, 'ExecIsDeleteTrigger') = 1 THEN 'DELETE' END [Event],
CASE WHEN OBJECTPROPERTY(s.id, 'ExecIsInsteadOfTrigger') = 1 THEN 'INSTEAD OF' ELSE 'AFTER' END [Timing],
c.text
FROM sysobjects s
JOIN syscomments c ON s.id = c.id
WHERE s.xtype = 'TR' AND s.name = ".q($D));$K=reset($M);if($K)$K["Statement"]=preg_replace('~^.+\\s+AS\\s+~isU','',$K["text"]);return$K;}function
triggers($R){$K=array();foreach(get_rows("SELECT sys1.name,
CASE WHEN OBJECTPROPERTY(sys1.id, 'ExecIsInsertTrigger') = 1 THEN 'INSERT' WHEN OBJECTPROPERTY(sys1.id, 'ExecIsUpdateTrigger') = 1 THEN 'UPDATE' WHEN OBJECTPROPERTY(sys1.id, 'ExecIsDeleteTrigger') = 1 THEN 'DELETE' END [Event],
CASE WHEN OBJECTPROPERTY(sys1.id, 'ExecIsInsteadOfTrigger') = 1 THEN 'INSTEAD OF' ELSE 'AFTER' END [Timing]
FROM sysobjects sys1
JOIN sysobjects sys2 ON sys1.parent_obj = sys2.id
WHERE sys1.xtype = 'TR' AND sys2.name = ".q($R))as$L)$K[$L["name"]]=array($L["Timing"],$L["Event"]);return$K;}function
trigger_options(){return
array("Timing"=>array("AFTER","INSTEAD OF"),"Event"=>array("INSERT","UPDATE","DELETE"),"Type"=>array("AS"),);}function
schemas(){return
get_vals("SELECT name FROM sys.schemas");}function
get_schema(){global$h;if($_GET["ns"]!="")return$_GET["ns"];return$h->result("SELECT SCHEMA_NAME()");}function
set_schema($De){return
true;}function
use_sql($k){return"USE ".idf_escape($k);}function
show_variables(){return
array();}function
show_status(){return
array();}function
convert_field($p){}function
unconvert_field($p,$K){return$K;}function
support($Xb){return
preg_match('~^(columns|database|drop_col|indexes|scheme|sql|table|trigger|view|view_trigger)$~',$Xb);}$y="mssql";$Cf=array();$Xe=array();foreach(array(lang(24)=>array("tinyint"=>3,"smallint"=>5,"int"=>10,"bigint"=>20,"bit"=>1,"decimal"=>0,"real"=>12,"float"=>53,"smallmoney"=>10,"money"=>20),lang(25)=>array("date"=>10,"smalldatetime"=>19,"datetime"=>19,"datetime2"=>19,"time"=>8,"datetimeoffset"=>10),lang(26)=>array("char"=>8000,"varchar"=>8000,"text"=>2147483647,"nchar"=>4000,"nvarchar"=>4000,"ntext"=>1073741823),lang(27)=>array("binary"=>8000,"varbinary"=>8000,"image"=>2147483647),)as$z=>$X){$Cf+=$X;$Xe[$z]=array_keys($X);}$Jf=array();$Ld=array("=","<",">","<=",">=","!=","LIKE","LIKE %%","IN","IS NULL","NOT LIKE","NOT IN","IS NOT NULL");$pc=array("len","lower","round","upper");$rc=array("avg","count","count distinct","max","min","sum");$Cb=array(array("date|time"=>"getdate",),array("int|decimal|real|float|money|datetime"=>"+/-","char|text"=>"+",));}$yb["simpledb"]="SimpleDB";if(isset($_GET["simpledb"])){$de=array("SimpleXML");define("DRIVER","simpledb");if(class_exists('SimpleXMLElement')){class
Min_DB{var$extension="SimpleXML",$server_info='2009-04-15',$error,$timeout,$next,$affected_rows,$_result;function
select_db($k){return($k=="domain");}function
query($I,$Df=false){$G=array('SelectExpression'=>$I,'ConsistentRead'=>'true');if($this->next)$G['NextToken']=$this->next;$J=sdb_request_all('Select','Item',$G,$this->timeout);if($J===false)return$J;if(preg_match('~^\s*SELECT\s+COUNT\(~i',$I)){$bf=0;foreach($J
as$Rc)$bf+=$Rc->Attribute->Value;$J=array((object)array('Attribute'=>array((object)array('Name'=>'Count','Value'=>$bf,))));}return
new
Min_Result($J);}function
multi_query($I){return$this->_result=$this->query($I);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
quote($Q){return"'".str_replace("'","''",$Q)."'";}}class
Min_Result{var$num_rows,$_rows=array(),$_offset=0;function
Min_Result($J){foreach($J
as$Rc){$L=array();if($Rc->Name!='')$L['itemName()']=(string)$Rc->Name;foreach($Rc->Attribute
as$Aa){$D=$this->_processValue($Aa->Name);$Y=$this->_processValue($Aa->Value);if(isset($L[$D])){$L[$D]=(array)$L[$D];$L[$D][]=$Y;}else$L[$D]=$Y;}$this->_rows[]=$L;foreach($L
as$z=>$X){if(!isset($this->_rows[0][$z]))$this->_rows[0][$z]=null;}}$this->num_rows=count($this->_rows);}function
_processValue($Eb){return(is_object($Eb)&&$Eb['encoding']=='base64'?base64_decode($Eb):(string)$Eb);}function
fetch_assoc(){$L=current($this->_rows);if(!$L)return$L;$K=array();foreach($this->_rows[0]as$z=>$X)$K[$z]=$L[$z];next($this->_rows);return$K;}function
fetch_row(){$K=$this->fetch_assoc();if(!$K)return$K;return
array_values($K);}function
fetch_field(){$Wc=array_keys($this->_rows[0]);return(object)array('name'=>$Wc[$this->_offset++]);}}}class
Min_Driver
extends
Min_SQL{public$fe="itemName()";function
_chunkRequest($Cc,$qa,$G,$Rb=array()){global$h;foreach(array_chunk($Cc,25)as$Ta){$Vd=$G;foreach($Ta
as$t=>$u){$Vd["Item.$t.ItemName"]=$u;foreach($Rb
as$z=>$X)$Vd["Item.$t.$z"]=$X;}if(!sdb_request($qa,$Vd))return
false;}$h->affected_rows=count($Cc);return
true;}function
_extractIds($R,$ne,$_){$K=array();if(preg_match_all("~itemName\(\) = (('[^']*+')+)~",$ne,$C))$K=array_map('idf_unescape',$C[1]);else{foreach(sdb_request_all('Select','Item',array('SelectExpression'=>'SELECT itemName() FROM '.table($R).$ne.($_?" LIMIT 1":"")))as$Rc)$K[]=$Rc->Name;}return$K;}function
select($R,$N,$Z,$s,$E=array(),$_=1,$F=0,$he=false){global$h;$h->next=$_GET["next"];$K=parent::select($R,$N,$Z,$s,$E,$_,$F,$he);$h->next=0;return$K;}function
delete($R,$ne,$_=0){return$this->_chunkRequest($this->_extractIds($R,$ne,$_),'BatchDeleteAttributes',array('DomainName'=>$R));}function
update($R,$P,$ne,$_=0,$Ke="\n"){$qb=array();$Mc=array();$t=0;$Cc=$this->_extractIds($R,$ne,$_);$u=idf_unescape($P["`itemName()`"]);unset($P["`itemName()`"]);foreach($P
as$z=>$X){$z=idf_unescape($z);if($X=="NULL"||($u!=""&&array($u)!=$Cc))$qb["Attribute.".count($qb).".Name"]=$z;if($X!="NULL"){foreach((array)$X
as$Sc=>$W){$Mc["Attribute.$t.Name"]=$z;$Mc["Attribute.$t.Value"]=(is_array($X)?$W:idf_unescape($W));if(!$Sc)$Mc["Attribute.$t.Replace"]="true";$t++;}}}$G=array('DomainName'=>$R);return(!$Mc||$this->_chunkRequest(($u!=""?array($u):$Cc),'BatchPutAttributes',$G,$Mc))&&(!$qb||$this->_chunkRequest($Cc,'BatchDeleteAttributes',$G,$qb));}function
insert($R,$P){$G=array("DomainName"=>$R);$t=0;foreach($P
as$D=>$Y){if($Y!="NULL"){$D=idf_unescape($D);if($D=="itemName()")$G["ItemName"]=idf_unescape($Y);else{foreach((array)$Y
as$X){$G["Attribute.$t.Name"]=$D;$G["Attribute.$t.Value"]=(is_array($Y)?$X:idf_unescape($Y));$t++;}}}}return
sdb_request('PutAttributes',$G);}function
insertUpdate($R,$M,$fe){foreach($M
as$P){if(!$this->update($R,$P,"WHERE `itemName()` = ".q($P["`itemName()`"])))return
false;}return
true;}function
begin(){return
false;}function
commit(){return
false;}function
rollback(){return
false;}}function
connect(){return
new
Min_DB;}function
support($Xb){return
preg_match('~sql~',$Xb);}function
logged_user(){global$b;$j=$b->credentials();return$j[1];}function
get_databases(){return
array("domain");}function
collations(){return
array();}function
db_collation($m,$Za){}function
tables_list(){global$h;$K=array();foreach(sdb_request_all('ListDomains','DomainName')as$R)$K[(string)$R]='table';if($h->error&&defined("PAGE_HEADER"))echo"<p class='error'>".error()."\n";return$K;}function
table_status($D="",$Wb=false){$K=array();foreach(($D!=""?array($D=>true):tables_list())as$R=>$U){$L=array("Name"=>$R,"Auto_increment"=>"");if(!$Wb){$td=sdb_request('DomainMetadata',array('DomainName'=>$R));if($td){foreach(array("Rows"=>"ItemCount","Data_length"=>"ItemNamesSizeBytes","Index_length"=>"AttributeValuesSizeBytes","Data_free"=>"AttributeNamesSizeBytes",)as$z=>$X)$L[$z]=(string)$td->$X;}}if($D!="")return$L;$K[$R]=$L;}return$K;}function
explain($h,$I){}function
error(){global$h;return
h($h->error);}function
information_schema(){}function
is_view($S){}function
indexes($R,$i=null){return
array(array("type"=>"PRIMARY","columns"=>array("itemName()")),);}function
fields($R){return
fields_from_edit();}function
foreign_keys($R){return
array();}function
table($v){return
idf_escape($v);}function
idf_escape($v){return"`".str_replace("`","``",$v)."`";}function
limit($I,$Z,$_,$Ed=0,$Ke=" "){return" $I$Z".($_!==null?$Ke."LIMIT $_":"");}function
unconvert_field($p,$K){return$K;}function
fk_support($S){}function
engines(){return
array();}function
alter_table($R,$D,$q,$ec,$cb,$Jb,$d,$Da,$Wd){return($R==""&&sdb_request('CreateDomain',array('DomainName'=>$D)));}function
drop_tables($T){foreach($T
as$R){if(!sdb_request('DeleteDomain',array('DomainName'=>$R)))return
false;}return
true;}function
count_tables($l){foreach($l
as$m)return
array($m=>count(tables_list()));}function
found_rows($S,$Z){return($Z?null:$S["Rows"]);}function
last_id(){}function
hmac($ua,$mb,$z,$re=false){$Ma=64;if(strlen($z)>$Ma)$z=pack("H*",$ua($z));$z=str_pad($z,$Ma,"\0");$Tc=$z^str_repeat("\x36",$Ma);$Uc=$z^str_repeat("\x5C",$Ma);$K=$ua($Uc.pack("H*",$ua($Tc.$mb)));if($re)$K=pack("H*",$K);return$K;}function
sdb_request($qa,$G=array()){global$b,$h;list($_c,$G['AWSAccessKeyId'],$Ge)=$b->credentials();$G['Action']=$qa;$G['Timestamp']=gmdate('Y-m-d\TH:i:s+00:00');$G['Version']='2009-04-15';$G['SignatureVersion']=2;$G['SignatureMethod']='HmacSHA1';ksort($G);$I='';foreach($G
as$z=>$X)$I.='&'.rawurlencode($z).'='.rawurlencode($X);$I=str_replace('%7E','~',substr($I,1));$I.="&Signature=".urlencode(base64_encode(hmac('sha1',"POST\n".preg_replace('~^https?://~','',$_c)."\n/\n$I",$Ge,true)));@ini_set('track_errors',1);$Yb=@file_get_contents((preg_match('~^https?://~',$_c)?$_c:"http://$_c"),false,stream_context_create(array('http'=>array('method'=>'POST','content'=>$I,'ignore_errors'=>1,))));if(!$Yb){$h->error=$php_errormsg;return
false;}libxml_use_internal_errors(true);$Zf=simplexml_load_string($Yb);if(!$Zf){$o=libxml_get_last_error();$h->error=$o->message;return
false;}if($Zf->Errors){$o=$Zf->Errors->Error;$h->error="$o->Message ($o->Code)";return
false;}$h->error='';$gf=$qa."Result";return($Zf->$gf?$Zf->$gf:true);}function
sdb_request_all($qa,$gf,$G=array(),$nf=0){$K=array();$Ue=($nf?microtime(true):0);$_=(preg_match('~LIMIT\s+(\d+)\s*$~i',$G['SelectExpression'],$B)?$B[1]:0);do{$Zf=sdb_request($qa,$G);if(!$Zf)break;foreach($Zf->$gf
as$Eb)$K[]=$Eb;if($_&&count($K)>=$_){$_GET["next"]=$Zf->NextToken;break;}if($nf&&microtime(true)-$Ue>$nf)return
false;$G['NextToken']=$Zf->NextToken;if($_)$G['SelectExpression']=preg_replace('~\d+\s*$~',$_-count($K),$G['SelectExpression']);}while($Zf->NextToken);return$K;}$y="simpledb";$Ld=array("=","<",">","<=",">=","!=","LIKE","LIKE %%","IN","IS NULL","NOT LIKE","IS NOT NULL");$pc=array();$rc=array("count");$Cb=array(array("json"));}$yb["mongo"]="MongoDB (beta)";if(isset($_GET["mongo"])){$de=array("mongo");define("DRIVER","mongo");if(class_exists('MongoDB')){class
Min_DB{var$extension="Mongo",$error,$last_id,$_link,$_db;function
connect($O,$V,$H){global$b;$m=$b->database();$Nd=array();if($V!=""){$Nd["username"]=$V;$Nd["password"]=$H;}if($m!="")$Nd["db"]=$m;try{$this->_link=@new
MongoClient("mongodb://$O",$Nd);return
true;}catch(Exception$Ob){$this->error=$Ob->getMessage();return
false;}}function
query($I){return
false;}function
select_db($k){try{$this->_db=$this->_link->selectDB($k);return
true;}catch(Exception$Ob){$this->error=$Ob->getMessage();return
false;}}function
quote($Q){return$Q;}}class
Min_Result{var$num_rows,$_rows=array(),$_offset=0,$_charset=array();function
Min_Result($J){foreach($J
as$Rc){$L=array();foreach($Rc
as$z=>$X){if(is_a($X,'MongoBinData'))$this->_charset[$z]=63;$L[$z]=(is_a($X,'MongoId')?'ObjectId("'.strval($X).'")':(is_a($X,'MongoDate')?gmdate("Y-m-d H:i:s",$X->sec)." GMT":(is_a($X,'MongoBinData')?$X->bin:(is_a($X,'MongoRegex')?strval($X):(is_object($X)?get_class($X):$X)))));}$this->_rows[]=$L;foreach($L
as$z=>$X){if(!isset($this->_rows[0][$z]))$this->_rows[0][$z]=null;}}$this->num_rows=count($this->_rows);}function
fetch_assoc(){$L=current($this->_rows);if(!$L)return$L;$K=array();foreach($this->_rows[0]as$z=>$X)$K[$z]=$L[$z];next($this->_rows);return$K;}function
fetch_row(){$K=$this->fetch_assoc();if(!$K)return$K;return
array_values($K);}function
fetch_field(){$Wc=array_keys($this->_rows[0]);$D=$Wc[$this->_offset++];return(object)array('name'=>$D,'charsetnr'=>$this->_charset[$D],);}}}class
Min_Driver
extends
Min_SQL{public$fe="_id";function
quote($Y){return($Y===null?$Y:parent::quote($Y));}function
select($R,$N,$Z,$s,$E=array(),$_=1,$F=0,$he=false){$N=($N==array("*")?array():array_fill_keys($N,true));$Qe=array();foreach($E
as$X){$X=preg_replace('~ DESC$~','',$X,1,$ib);$Qe[$X]=($ib?-1:1);}return
new
Min_Result($this->_conn->_db->selectCollection($R)->find(array(),$N)->sort($Qe)->limit(+$_)->skip($F*$_));}function
insert($R,$P){try{$K=$this->_conn->_db->selectCollection($R)->insert($P);$this->_conn->errno=$K['code'];$this->_conn->error=$K['err'];$this->_conn->last_id=$P['_id'];return!$K['err'];}catch(Exception$Ob){$this->_conn->error=$Ob->getMessage();return
false;}}}function
connect(){global$b;$h=new
Min_DB;$j=$b->credentials();if($h->connect($j[0],$j[1],$j[2]))return$h;return$h->error;}function
error(){global$h;return
h($h->error);}function
logged_user(){global$b;$j=$b->credentials();return$j[1];}function
get_databases($dc){global$h;$K=array();$nb=$h->_link->listDBs();foreach($nb['databases']as$m)$K[]=$m['name'];return$K;}function
collations(){return
array();}function
db_collation($m,$Za){}function
count_tables($l){global$h;$K=array();foreach($l
as$m)$K[$m]=count($h->_link->selectDB($m)->getCollectionNames(true));return$K;}function
tables_list(){global$h;return
array_fill_keys($h->_db->getCollectionNames(true),'table');}function
table_status($D="",$Wb=false){$K=array();foreach(tables_list()as$R=>$U){$K[$R]=array("Name"=>$R);if($D==$R)return$K[$R];}return$K;}function
information_schema(){}function
is_view($S){}function
drop_databases($l){global$h;foreach($l
as$m){$ye=$h->_link->selectDB($m)->drop();if(!$ye['ok'])return
false;}return
true;}function
indexes($R,$i=null){global$h;$K=array();foreach($h->_db->selectCollection($R)->getIndexInfo()as$w){$tb=array();foreach($w["key"]as$e=>$U)$tb[]=($U==-1?'1':null);$K[$w["name"]]=array("type"=>($w["name"]=="_id_"?"PRIMARY":($w["unique"]?"UNIQUE":"INDEX")),"columns"=>array_keys($w["key"]),"lengths"=>array(),"descs"=>$tb,);}return$K;}function
fields($R){return
fields_from_edit();}function
convert_field($p){}function
unconvert_field($p,$K){return$K;}function
foreign_keys($R){return
array();}function
fk_support($S){}function
engines(){return
array();}function
found_rows($S,$Z){global$h;return$h->_db->selectCollection($_GET["select"])->count($Z);}function
alter_table($R,$D,$q,$ec,$cb,$Jb,$d,$Da,$Wd){global$h;if($R==""){$h->_db->createCollection($D);return
true;}}function
drop_tables($T){global$h;foreach($T
as$R){$ye=$h->_db->selectCollection($R)->drop();if(!$ye['ok'])return
false;}return
true;}function
truncate_tables($T){global$h;foreach($T
as$R){$ye=$h->_db->selectCollection($R)->remove();if(!$ye['ok'])return
false;}return
true;}function
alter_indexes($R,$c){global$h;foreach($c
as$X){list($U,$D,$P)=$X;if($P=="DROP")$K=$h->_db->command(array("deleteIndexes"=>$R,"index"=>$D));else{$f=array();foreach($P
as$e){$e=preg_replace('~ DESC$~','',$e,1,$ib);$f[$e]=($ib?-1:1);}$K=$h->_db->selectCollection($R)->ensureIndex($f,array("unique"=>($U=="UNIQUE"),"name"=>$D,));}if($K['errmsg']){$h->error=$K['errmsg'];return
false;}}return
true;}function
last_id(){global$h;return$h->last_id;}function
table($v){return$v;}function
idf_escape($v){return$v;}function
support($Xb){return
preg_match("~database|indexes~",$Xb);}$y="mongo";$Ld=array("=");$pc=array();$rc=array();$Cb=array(array("json"));}$yb["elastic"]="Elasticsearch (beta)";if(isset($_GET["elastic"])){$de=array("json");define("DRIVER","elastic");if(function_exists('json_decode')){class
Min_DB{var$extension="JSON",$server_info,$errno,$error,$_url;function
rootQuery($Xd,$gb=array(),$ud='GET'){@ini_set('track_errors',1);$Yb=@file_get_contents($this->_url.'/'.ltrim($Xd,'/'),false,stream_context_create(array('http'=>array('method'=>$ud,'content'=>json_encode($gb),'ignore_errors'=>1,))));if(!$Yb){$this->error=$php_errormsg;return$Yb;}if(!preg_match('~^HTTP/[0-9.]+ 2~i',$http_response_header[0])){$this->error=$Yb;return
false;}$K=json_decode($Yb,true);if(!$K){$this->errno=json_last_error();if(function_exists('json_last_error_msg'))$this->error=json_last_error_msg();else{$fb=get_defined_constants(true);foreach($fb['json']as$D=>$Y){if($Y==$this->errno&&preg_match('~^JSON_ERROR_~',$D)){$this->error=$D;break;}}}}return$K;}function
query($Xd,$gb=array(),$ud='GET'){return$this->rootQuery(($this->_db!=""?"$this->_db/":"/").ltrim($Xd,'/'),$gb,$ud);}function
connect($O,$V,$H){$this->_url="http://$V:$H@$O/";$K=$this->query('');if($K)$this->server_info=$K['version']['number'];return(bool)$K;}function
select_db($k){$this->_db=$k;return
true;}function
quote($Q){return$Q;}}class
Min_Result{var$num_rows,$_rows;function
Min_Result($M){$this->num_rows=count($this->_rows);$this->_rows=$M;reset($this->_rows);}function
fetch_assoc(){$K=current($this->_rows);next($this->_rows);return$K;}function
fetch_row(){return
array_values($this->fetch_assoc());}}}class
Min_Driver
extends
Min_SQL{function
select($R,$N,$Z,$s,$E=array(),$_=1,$F=0,$he=false){global$b;$mb=array();$I="$R/_search";if($N!=array("*"))$mb["fields"]=$N;if($E){$Qe=array();foreach($E
as$Ya){$Ya=preg_replace('~ DESC$~','',$Ya,1,$ib);$Qe[]=($ib?array($Ya=>"desc"):$Ya);}$mb["sort"]=$Qe;}if($_){$mb["size"]=+$_;if($F)$mb["from"]=($F*$_);}foreach((array)$_GET["where"]as$X){if("$X[col]$X[val]"!=""){$if=array("match"=>array(($X["col"]!=""?$X["col"]:"_all")=>$X["val"]));if($X["op"]=="=")$mb["query"]["filtered"]["filter"]["and"][]=$if;else$mb["query"]["filtered"]["query"]["bool"]["must"][]=$if;}}if($mb["query"]&&!$mb["query"]["filtered"]["query"])$mb["query"]["filtered"]["query"]=array("match_all"=>array());$Ue=microtime(true);$Fe=$this->_conn->query($I,$mb);if($he)echo$b->selectQuery("$I: ".print_r($mb,true),format_time($Ue));if(!$Fe)return
false;$K=array();foreach($Fe['hits']['hits']as$zc){$L=array();$q=$zc['_source'];if($N!=array("*")){$q=array();foreach($N
as$z)$q[$z]=$zc['fields'][$z];}foreach($q
as$z=>$X)$L[$z]=(is_array($X)?json_encode($X):$X);$K[]=$L;}return
new
Min_Result($K);}}function
connect(){global$b;$h=new
Min_DB;$j=$b->credentials();if($h->connect($j[0],$j[1],$j[2]))return$h;return$h->error;}function
support($Xb){return
preg_match("~database|table|columns~",$Xb);}function
logged_user(){global$b;$j=$b->credentials();return$j[1];}function
get_databases(){global$h;$K=$h->rootQuery('_aliases');if($K)$K=array_keys($K);return$K;}function
collations(){return
array();}function
db_collation($m,$Za){}function
count_tables($l){global$h;$K=$h->query('_mapping');if($K)$K=array_map('count',$K);return$K;}function
tables_list(){global$h;$K=$h->query('_mapping');if($K)$K=array_fill_keys(array_keys(reset($K)),'table');return$K;}function
table_status($D="",$Wb=false){global$h;$Fe=$h->query("_search?search_type=count",array("facets"=>array("count_by_type"=>array("terms"=>array("field"=>"_type",)))),"POST");$K=array();if($Fe){foreach($Fe["facets"]["count_by_type"]["terms"]as$R)$K[$R["term"]]=array("Name"=>$R["term"],"Engine"=>"table","Rows"=>$R["count"],);if($D!=""&&$D==$R["term"])return$K[$D];}return$K;}function
error(){global$h;return
h($h->error);}function
information_schema(){}function
is_view($S){}function
indexes($R,$i=null){return
array(array("type"=>"PRIMARY","columns"=>array("_id")),);}function
fields($R){global$h;$kd=$h->query("$R/_mapping");$K=array();if($kd){foreach($kd[$R]['properties']as$D=>$p)$K[$D]=array("field"=>$D,"full_type"=>$p["type"],"type"=>$p["type"],"privileges"=>array("insert"=>1,"select"=>1,"update"=>1),);}return$K;}function
foreign_keys($R){return
array();}function
table($v){return$v;}function
idf_escape($v){return$v;}function
convert_field($p){}function
unconvert_field($p,$K){return$K;}function
fk_support($S){}function
found_rows($S,$Z){return
null;}function
create_database($m){global$h;return$h->rootQuery(urlencode($m),array(),'PUT');}function
drop_databases($l){global$h;return$h->rootQuery(urlencode(implode(',',$l)),array(),'DELETE');}function
drop_tables($T){global$h;$K=true;foreach($T
as$R)$K=$K&&$h->query(urlencode($R),array(),'DELETE');return$K;}$y="elastic";$Ld=array("=","query");$pc=array();$rc=array();$Cb=array(array("json"));}$yb=array("server"=>"MySQL")+$yb;if(!defined("DRIVER")){$de=array("MySQLi","MySQL","PDO_MySQL");define("DRIVER","server");if(extension_loaded("mysqli")){class
Min_DB
extends
MySQLi{var$extension="MySQLi";function
Min_DB(){parent::init();}function
connect($O,$V,$H){mysqli_report(MYSQLI_REPORT_OFF);list($_c,$be)=explode(":",$O,2);$K=@$this->real_connect(($O!=""?$_c:ini_get("mysqli.default_host")),($O.$V!=""?$V:ini_get("mysqli.default_user")),($O.$V.$H!=""?$H:ini_get("mysqli.default_pw")),null,(is_numeric($be)?$be:ini_get("mysqli.default_port")),(!is_numeric($be)?$be:null));if($K){if(method_exists($this,'set_charset'))$this->set_charset("utf8");else$this->query("SET NAMES utf8");}return$K;}function
result($I,$p=0){$J=$this->query($I);if(!$J)return
false;$L=$J->fetch_array();return$L[$p];}function
quote($Q){return"'".$this->escape_string($Q)."'";}}}elseif(extension_loaded("mysql")&&!(ini_get("sql.safe_mode")&&extension_loaded("pdo_mysql"))){class
Min_DB{var$extension="MySQL",$server_info,$affected_rows,$errno,$error,$_link,$_result;function
connect($O,$V,$H){$this->_link=@mysql_connect(($O!=""?$O:ini_get("mysql.default_host")),("$O$V"!=""?$V:ini_get("mysql.default_user")),("$O$V$H"!=""?$H:ini_get("mysql.default_password")),true,131072);if($this->_link){$this->server_info=mysql_get_server_info($this->_link);if(function_exists('mysql_set_charset'))mysql_set_charset("utf8",$this->_link);else$this->query("SET NAMES utf8");}else$this->error=mysql_error();return(bool)$this->_link;}function
quote($Q){return"'".mysql_real_escape_string($Q,$this->_link)."'";}function
select_db($k){return
mysql_select_db($k,$this->_link);}function
query($I,$Df=false){$J=@($Df?mysql_unbuffered_query($I,$this->_link):mysql_query($I,$this->_link));$this->error="";if(!$J){$this->errno=mysql_errno($this->_link);$this->error=mysql_error($this->_link);return
false;}if($J===true){$this->affected_rows=mysql_affected_rows($this->_link);$this->info=mysql_info($this->_link);return
true;}return
new
Min_Result($J);}function
multi_query($I){return$this->_result=$this->query($I);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
result($I,$p=0){$J=$this->query($I);if(!$J||!$J->num_rows)return
false;return
mysql_result($J->_result,0,$p);}}class
Min_Result{var$num_rows,$_result,$_offset=0;function
Min_Result($J){$this->_result=$J;$this->num_rows=mysql_num_rows($J);}function
fetch_assoc(){return
mysql_fetch_assoc($this->_result);}function
fetch_row(){return
mysql_fetch_row($this->_result);}function
fetch_field(){$K=mysql_fetch_field($this->_result,$this->_offset++);$K->orgtable=$K->table;$K->orgname=$K->name;$K->charsetnr=($K->blob?63:0);return$K;}function
__destruct(){mysql_free_result($this->_result);}}}elseif(extension_loaded("pdo_mysql")){class
Min_DB
extends
Min_PDO{var$extension="PDO_MySQL";function
connect($O,$V,$H){$this->dsn("mysql:charset=utf8;host=".str_replace(":",";unix_socket=",preg_replace('~:(\\d)~',';port=\\1',$O)),$V,$H);$this->query("SET NAMES utf8");return
true;}function
select_db($k){return$this->query("USE ".idf_escape($k));}function
query($I,$Df=false){$this->setAttribute(1000,!$Df);return
parent::query($I,$Df);}}}class
Min_Driver
extends
Min_SQL{function
insert($R,$P){return($P?parent::insert($R,$P):queries("INSERT INTO ".table($R)." ()\nVALUES ()"));}function
insertUpdate($R,$M,$fe){$f=array_keys(reset($M));$ee="INSERT INTO ".table($R)." (".implode(", ",$f).") VALUES\n";$Pf=array();foreach($f
as$z)$Pf[$z]="$z = VALUES($z)";$af="\nON DUPLICATE KEY UPDATE ".implode(", ",$Pf);$Pf=array();$ed=0;foreach($M
as$P){$Y="(".implode(", ",$P).")";if($Pf&&(strlen($ee)+$ed+strlen($Y)+strlen($af)>1e6)){if(!queries($ee.implode(",\n",$Pf).$af))return
false;$Pf=array();$ed=0;}$Pf[]=$Y;$ed+=strlen($Y)+2;}return
queries($ee.implode(",\n",$Pf).$af);}}function
idf_escape($v){return"`".str_replace("`","``",$v)."`";}function
table($v){return
idf_escape($v);}function
connect(){global$b;$h=new
Min_DB;$j=$b->credentials();if($h->connect($j[0],$j[1],$j[2])){$h->query("SET sql_quote_show_create = 1, autocommit = 1");return$h;}$K=$h->error;if(function_exists('iconv')&&!is_utf8($K)&&strlen($Ce=iconv("windows-1250","utf-8",$K))>strlen($K))$K=$Ce;return$K;}function
get_databases($dc){global$h;$K=get_session("dbs");if($K===null){$I=($h->server_info>=5?"SELECT SCHEMA_NAME FROM information_schema.SCHEMATA":"SHOW DATABASES");$K=($dc?slow_query($I):get_vals($I));restart_session();set_session("dbs",$K);stop_session();}return$K;}function
limit($I,$Z,$_,$Ed=0,$Ke=" "){return" $I$Z".($_!==null?$Ke."LIMIT $_".($Ed?" OFFSET $Ed":""):"");}function
limit1($I,$Z){return
limit($I,$Z,1);}function
db_collation($m,$Za){global$h;$K=null;$jb=$h->result("SHOW CREATE DATABASE ".idf_escape($m),1);if(preg_match('~ COLLATE ([^ ]+)~',$jb,$B))$K=$B[1];elseif(preg_match('~ CHARACTER SET ([^ ]+)~',$jb,$B))$K=$Za[$B[1]][-1];return$K;}function
engines(){$K=array();foreach(get_rows("SHOW ENGINES")as$L){if(preg_match("~YES|DEFAULT~",$L["Support"]))$K[]=$L["Engine"];}return$K;}function
logged_user(){global$h;return$h->result("SELECT USER()");}function
tables_list(){global$h;return
get_key_vals($h->server_info>=5?"SELECT TABLE_NAME, TABLE_TYPE FROM information_schema.TABLES WHERE TABLE_SCHEMA = DATABASE() ORDER BY TABLE_NAME":"SHOW TABLES");}function
count_tables($l){$K=array();foreach($l
as$m)$K[$m]=count(get_vals("SHOW TABLES IN ".idf_escape($m)));return$K;}function
table_status($D="",$Wb=false){global$h;$K=array();foreach(get_rows($Wb&&$h->server_info>=5?"SELECT TABLE_NAME AS Name, Engine, TABLE_COMMENT AS Comment FROM information_schema.TABLES WHERE TABLE_SCHEMA = DATABASE() ".($D!=""?"AND TABLE_NAME = ".q($D):"ORDER BY Name"):"SHOW TABLE STATUS".($D!=""?" LIKE ".q(addcslashes($D,"%_\\")):""))as$L){if($L["Engine"]=="InnoDB")$L["Comment"]=preg_replace('~(?:(.+); )?InnoDB free: .*~','\\1',$L["Comment"]);if(!isset($L["Engine"]))$L["Comment"]="";if($D!="")return$L;$K[$L["Name"]]=$L;}return$K;}function
is_view($S){return$S["Engine"]===null;}function
fk_support($S){return
preg_match('~InnoDB|IBMDB2I~i',$S["Engine"]);}function
fields($R){$K=array();foreach(get_rows("SHOW FULL COLUMNS FROM ".table($R))as$L){preg_match('~^([^( ]+)(?:\\((.+)\\))?( unsigned)?( zerofill)?$~',$L["Type"],$B);$K[$L["Field"]]=array("field"=>$L["Field"],"full_type"=>$L["Type"],"type"=>$B[1],"length"=>$B[2],"unsigned"=>ltrim($B[3].$B[4]),"default"=>($L["Default"]!=""||preg_match("~char|set~",$B[1])?$L["Default"]:null),"null"=>($L["Null"]=="YES"),"auto_increment"=>($L["Extra"]=="auto_increment"),"on_update"=>(preg_match('~^on update (.+)~i',$L["Extra"],$B)?$B[1]:""),"collation"=>$L["Collation"],"privileges"=>array_flip(preg_split('~, *~',$L["Privileges"])),"comment"=>$L["Comment"],"primary"=>($L["Key"]=="PRI"),);}return$K;}function
indexes($R,$i=null){$K=array();foreach(get_rows("SHOW INDEX FROM ".table($R),$i)as$L){$K[$L["Key_name"]]["type"]=($L["Key_name"]=="PRIMARY"?"PRIMARY":($L["Index_type"]=="FULLTEXT"?"FULLTEXT":($L["Non_unique"]?"INDEX":"UNIQUE")));$K[$L["Key_name"]]["columns"][]=$L["Column_name"];$K[$L["Key_name"]]["lengths"][]=$L["Sub_part"];$K[$L["Key_name"]]["descs"][]=null;}return$K;}function
foreign_keys($R){global$h,$Gd;static$Yd='`(?:[^`]|``)+`';$K=array();$kb=$h->result("SHOW CREATE TABLE ".table($R),1);if($kb){preg_match_all("~CONSTRAINT ($Yd) FOREIGN KEY \\(((?:$Yd,? ?)+)\\) REFERENCES ($Yd)(?:\\.($Yd))? \\(((?:$Yd,? ?)+)\\)(?: ON DELETE ($Gd))?(?: ON UPDATE ($Gd))?~",$kb,$C,PREG_SET_ORDER);foreach($C
as$B){preg_match_all("~$Yd~",$B[2],$Re);preg_match_all("~$Yd~",$B[5],$hf);$K[idf_unescape($B[1])]=array("db"=>idf_unescape($B[4]!=""?$B[3]:$B[4]),"table"=>idf_unescape($B[4]!=""?$B[4]:$B[3]),"source"=>array_map('idf_unescape',$Re[0]),"target"=>array_map('idf_unescape',$hf[0]),"on_delete"=>($B[6]?$B[6]:"RESTRICT"),"on_update"=>($B[7]?$B[7]:"RESTRICT"),);}}return$K;}function
view($D){global$h;return
array("select"=>preg_replace('~^(?:[^`]|`[^`]*`)*\\s+AS\\s+~isU','',$h->result("SHOW CREATE VIEW ".table($D),1)));}function
collations(){$K=array();foreach(get_rows("SHOW COLLATION")as$L){if($L["Default"])$K[$L["Charset"]][-1]=$L["Collation"];else$K[$L["Charset"]][]=$L["Collation"];}ksort($K);foreach($K
as$z=>$X)asort($K[$z]);return$K;}function
information_schema($m){global$h;return($h->server_info>=5&&$m=="information_schema")||($h->server_info>=5.5&&$m=="performance_schema");}function
error(){global$h;return
h(preg_replace('~^You have an error.*syntax to use~U',"Syntax error",$h->error));}function
error_line(){global$h;if(preg_match('~ at line ([0-9]+)$~',$h->error,$te))return$te[1]-1;}function
create_database($m,$d){set_session("dbs",null);return
queries("CREATE DATABASE ".idf_escape($m).($d?" COLLATE ".q($d):""));}function
drop_databases($l){restart_session();set_session("dbs",null);return
apply_queries("DROP DATABASE",$l,'idf_escape');}function
rename_database($D,$d){if(create_database($D,$d)){$ve=array();foreach(tables_list()as$R=>$U)$ve[]=table($R)." TO ".idf_escape($D).".".table($R);if(!$ve||queries("RENAME TABLE ".implode(", ",$ve))){queries("DROP DATABASE ".idf_escape(DB));return
true;}}return
false;}function
auto_increment(){$Ea=" PRIMARY KEY";if($_GET["create"]!=""&&$_POST["auto_increment_col"]){foreach(indexes($_GET["create"])as$w){if(in_array($_POST["fields"][$_POST["auto_increment_col"]]["orig"],$w["columns"],true)){$Ea="";break;}if($w["type"]=="PRIMARY")$Ea=" UNIQUE";}}return" AUTO_INCREMENT$Ea";}function
alter_table($R,$D,$q,$ec,$cb,$Jb,$d,$Da,$Wd){$c=array();foreach($q
as$p)$c[]=($p[1]?($R!=""?($p[0]!=""?"CHANGE ".idf_escape($p[0]):"ADD"):" ")." ".implode($p[1]).($R!=""?$p[2]:""):"DROP ".idf_escape($p[0]));$c=array_merge($c,$ec);$Ve="COMMENT=".q($cb).($Jb?" ENGINE=".q($Jb):"").($d?" COLLATE ".q($d):"").($Da!=""?" AUTO_INCREMENT=$Da":"").$Wd;if($R=="")return
queries("CREATE TABLE ".table($D)." (\n".implode(",\n",$c)."\n) $Ve");if($R!=$D)$c[]="RENAME TO ".table($D);$c[]=$Ve;return
queries("ALTER TABLE ".table($R)."\n".implode(",\n",$c));}function
alter_indexes($R,$c){foreach($c
as$z=>$X)$c[$z]=($X[2]=="DROP"?"\nDROP INDEX ".idf_escape($X[1]):"\nADD $X[0] ".($X[0]=="PRIMARY"?"KEY ":"").($X[1]!=""?idf_escape($X[1])." ":"")."(".implode(", ",$X[2]).")");return
queries("ALTER TABLE ".table($R).implode(",",$c));}function
truncate_tables($T){return
apply_queries("TRUNCATE TABLE",$T);}function
drop_views($Tf){return
queries("DROP VIEW ".implode(", ",array_map('table',$Tf)));}function
drop_tables($T){return
queries("DROP TABLE ".implode(", ",array_map('table',$T)));}function
move_tables($T,$Tf,$hf){$ve=array();foreach(array_merge($T,$Tf)as$R)$ve[]=table($R)." TO ".idf_escape($hf).".".table($R);return
queries("RENAME TABLE ".implode(", ",$ve));}function
copy_tables($T,$Tf,$hf){queries("SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO'");foreach($T
as$R){$D=($hf==DB?table("copy_$R"):idf_escape($hf).".".table($R));if(!queries("\nDROP TABLE IF EXISTS $D")||!queries("CREATE TABLE $D LIKE ".table($R))||!queries("INSERT INTO $D SELECT * FROM ".table($R)))return
false;}foreach($Tf
as$R){$D=($hf==DB?table("copy_$R"):idf_escape($hf).".".table($R));$Sf=view($R);if(!queries("DROP VIEW IF EXISTS $D")||!queries("CREATE VIEW $D AS $Sf[select]"))return
false;}return
true;}function
trigger($D){if($D=="")return
array();$M=get_rows("SHOW TRIGGERS WHERE `Trigger` = ".q($D));return
reset($M);}function
triggers($R){$K=array();foreach(get_rows("SHOW TRIGGERS LIKE ".q(addcslashes($R,"%_\\")))as$L)$K[$L["Trigger"]]=array($L["Timing"],$L["Event"]);return$K;}function
trigger_options(){return
array("Timing"=>array("BEFORE","AFTER"),"Event"=>array("INSERT","UPDATE","DELETE"),"Type"=>array("FOR EACH ROW"),);}function
routine($D,$U){global$h,$Kb,$Kc,$Cf;$va=array("bool","boolean","integer","double precision","real","dec","numeric","fixed","national char","national varchar");$Bf="((".implode("|",array_merge(array_keys($Cf),$va)).")\\b(?:\\s*\\(((?:[^'\")]|$Kb)++)\\))?\\s*(zerofill\\s*)?(unsigned(?:\\s+zerofill)?)?)(?:\\s*(?:CHARSET|CHARACTER\\s+SET)\\s*['\"]?([^'\"\\s]+)['\"]?)?";$Yd="\\s*(".($U=="FUNCTION"?"":$Kc).")?\\s*(?:`((?:[^`]|``)*)`\\s*|\\b(\\S+)\\s+)$Bf";$jb=$h->result("SHOW CREATE $U ".idf_escape($D),2);preg_match("~\\(((?:$Yd\\s*,?)*)\\)\\s*".($U=="FUNCTION"?"RETURNS\\s+$Bf\\s+":"")."(.*)~is",$jb,$B);$q=array();preg_match_all("~$Yd\\s*,?~is",$B[1],$C,PREG_SET_ORDER);foreach($C
as$Ud){$D=str_replace("``","`",$Ud[2]).$Ud[3];$q[]=array("field"=>$D,"type"=>strtolower($Ud[5]),"length"=>preg_replace_callback("~$Kb~s",'normalize_enum',$Ud[6]),"unsigned"=>strtolower(preg_replace('~\\s+~',' ',trim("$Ud[8] $Ud[7]"))),"null"=>1,"full_type"=>$Ud[4],"inout"=>strtoupper($Ud[1]),"collation"=>strtolower($Ud[9]),);}if($U!="FUNCTION")return
array("fields"=>$q,"definition"=>$B[11]);return
array("fields"=>$q,"returns"=>array("type"=>$B[12],"length"=>$B[13],"unsigned"=>$B[15],"collation"=>$B[16]),"definition"=>$B[17],"language"=>"SQL",);}function
routines(){return
get_rows("SELECT ROUTINE_NAME, ROUTINE_TYPE, DTD_IDENTIFIER FROM information_schema.ROUTINES WHERE ROUTINE_SCHEMA = ".q(DB));}function
routine_languages(){return
array();}function
last_id(){global$h;return$h->result("SELECT LAST_INSERT_ID()");}function
explain($h,$I){return$h->query("EXPLAIN ".($h->server_info>=5.1?"PARTITIONS ":"").$I);}function
found_rows($S,$Z){return($Z||$S["Engine"]!="InnoDB"?null:$S["Rows"]);}function
types(){return
array();}function
schemas(){return
array();}function
get_schema(){return"";}function
set_schema($De){return
true;}function
create_sql($R,$Da){global$h;$K=$h->result("SHOW CREATE TABLE ".table($R),1);if(!$Da)$K=preg_replace('~ AUTO_INCREMENT=\\d+~','',$K);return$K;}function
truncate_sql($R){return"TRUNCATE ".table($R);}function
use_sql($k){return"USE ".idf_escape($k);}function
trigger_sql($R,$Ye){$K="";foreach(get_rows("SHOW TRIGGERS LIKE ".q(addcslashes($R,"%_\\")),null,"-- ")as$L)$K.="\n".($Ye=='CREATE+ALTER'?"DROP TRIGGER IF EXISTS ".idf_escape($L["Trigger"]).";;\n":"")."CREATE TRIGGER ".idf_escape($L["Trigger"])." $L[Timing] $L[Event] ON ".table($L["Table"])." FOR EACH ROW\n$L[Statement];;\n";return$K;}function
show_variables(){return
get_key_vals("SHOW VARIABLES");}function
process_list(){return
get_rows("SHOW FULL PROCESSLIST");}function
show_status(){return
get_key_vals("SHOW STATUS");}function
convert_field($p){if(preg_match("~binary~",$p["type"]))return"HEX(".idf_escape($p["field"]).")";if($p["type"]=="bit")return"BIN(".idf_escape($p["field"])." + 0)";if(preg_match("~geometry|point|linestring|polygon~",$p["type"]))return"AsWKT(".idf_escape($p["field"]).")";}function
unconvert_field($p,$K){if(preg_match("~binary~",$p["type"]))$K="UNHEX($K)";if($p["type"]=="bit")$K="CONV($K, 2, 10) + 0";if(preg_match("~geometry|point|linestring|polygon~",$p["type"]))$K="GeomFromText($K)";return$K;}function
support($Xb){global$h;return!preg_match("~scheme|sequence|type|view_trigger".($h->server_info<5.1?"|event|partitioning".($h->server_info<5?"|routine|trigger|view":""):"")."~",$Xb);}$y="sql";$Cf=array();$Xe=array();foreach(array(lang(24)=>array("tinyint"=>3,"smallint"=>5,"mediumint"=>8,"int"=>10,"bigint"=>20,"decimal"=>66,"float"=>12,"double"=>21),lang(25)=>array("date"=>10,"datetime"=>19,"timestamp"=>19,"time"=>10,"year"=>4),lang(26)=>array("char"=>255,"varchar"=>65535,"tinytext"=>255,"text"=>65535,"mediumtext"=>16777215,"longtext"=>4294967295),lang(30)=>array("enum"=>65535,"set"=>64),lang(27)=>array("bit"=>20,"binary"=>255,"varbinary"=>65535,"tinyblob"=>255,"blob"=>65535,"mediumblob"=>16777215,"longblob"=>4294967295),lang(29)=>array("geometry"=>0,"point"=>0,"linestring"=>0,"polygon"=>0,"multipoint"=>0,"multilinestring"=>0,"multipolygon"=>0,"geometrycollection"=>0),)as$z=>$X){$Cf+=$X;$Xe[$z]=array_keys($X);}$Jf=array("unsigned","zerofill","unsigned zerofill");$Ld=array("=","<",">","<=",">=","!=","LIKE","LIKE %%","REGEXP","IN","IS NULL","NOT LIKE","NOT REGEXP","NOT IN","IS NOT NULL","SQL");$pc=array("char_length","date","from_unixtime","lower","round","sec_to_time","time_to_sec","upper");$rc=array("avg","count","count distinct","group_concat","max","min","sum");$Cb=array(array("char"=>"md5/sha1/password/encrypt/uuid","binary"=>"md5/sha1","date|time"=>"now",),array("(^|[^o])int|float|double|decimal"=>"+/-","date"=>"+ interval/- interval","time"=>"addtime/subtime","char|text"=>"concat",));}define("SERVER",$_GET[DRIVER]);define("DB",$_GET["db"]);define("ME",preg_replace('~^[^?]*/([^?]*).*~','\\1',$_SERVER["REQUEST_URI"]).'?'.(sid()?SID.'&':'').(SERVER!==null?DRIVER."=".urlencode(SERVER).'&':'').(isset($_GET["username"])?"username=".urlencode($_GET["username"]).'&':'').(DB!=""?'db='.urlencode(DB).'&'.(isset($_GET["ns"])?"ns=".urlencode($_GET["ns"])."&":""):''));$ca="4.1.0";class
Adminer{var$operators=array("<=",">=");var$_values=array();function
name(){return"<a href='http://www.adminer.org/editor/' target='_blank' id='h1'>".lang(31)."</a>";}function
credentials(){return
array(SERVER,$_GET["username"],get_password());}function
permanentLogin($jb=false){return
password_file($jb);}function
bruteForceKey(){return$_SERVER["REMOTE_ADDR"];}function
database(){global$h;if($h){$l=$this->databases(false);return(!$l?$h->result("SELECT SUBSTRING_INDEX(CURRENT_USER, '@', 1)"):$l[(information_schema($l[0])?1:0)]);}}function
schemas(){return
schemas();}function
databases($dc=true){return
get_databases($dc);}function
queryTimeout(){return
5;}function
headers(){return
true;}function
head(){return
true;}function
loginForm(){echo'<table cellspacing="0">
<tr><th>',lang(32),'<td><input type="hidden" name="auth[driver]" value="server"><input name="auth[username]" id="username" value="',h($_GET["username"]),'" autocapitalize="off">
<tr><th>',lang(33),'<td><input type="password" name="auth[password]">
</table>
<script type="text/javascript">
focus(document.getElementById(\'username\'));
</script>
',"<p><input type='submit' value='".lang(34)."'>\n",checkbox("auth[permanent]",1,$_COOKIE["adminer_permanent"],lang(35))."\n";}function
login($id,$H){global$h;$h->query("SET time_zone = ".q(substr_replace(@date("O"),":",-2,0)));return
true;}function
tableName($df){return
h($df["Comment"]!=""?$df["Comment"]:$df["Name"]);}function
fieldName($p,$E=0){return
h($p["comment"]!=""?$p["comment"]:$p["field"]);}function
selectLinks($df,$P=""){$a=$df["Name"];if($P!==null)echo'<p class="tabs"><a href="'.h(ME.'edit='.urlencode($a).$P).'">'.lang(36)."</a>\n";}function
foreignKeys($R){return
foreign_keys($R);}function
backwardKeys($R,$cf){$K=array();foreach(get_rows("SELECT TABLE_NAME, CONSTRAINT_NAME, COLUMN_NAME, REFERENCED_COLUMN_NAME
FROM information_schema.KEY_COLUMN_USAGE
WHERE TABLE_SCHEMA = ".q($this->database())."
AND REFERENCED_TABLE_SCHEMA = ".q($this->database())."
AND REFERENCED_TABLE_NAME = ".q($R)."
ORDER BY ORDINAL_POSITION",null,"")as$L)$K[$L["TABLE_NAME"]]["keys"][$L["CONSTRAINT_NAME"]][$L["COLUMN_NAME"]]=$L["REFERENCED_COLUMN_NAME"];foreach($K
as$z=>$X){$D=$this->tableName(table_status($z,true));if($D!=""){$Fe=preg_quote($cf);$Ke="(:|\\s*-)?\\s+";$K[$z]["name"]=(preg_match("(^$Fe$Ke(.+)|^(.+?)$Ke$Fe\$)iu",$D,$B)?$B[2].$B[3]:$D);}else
unset($K[$z]);}return$K;}function
backwardKeysPrint($Ha,$L){foreach($Ha
as$R=>$Ga){foreach($Ga["keys"]as$ab){$A=ME.'select='.urlencode($R);$t=0;foreach($ab
as$e=>$X)$A.=where_link($t++,$e,$L[$X]);echo"<a href='".h($A)."'>".h($Ga["name"])."</a>";$A=ME.'edit='.urlencode($R);foreach($ab
as$e=>$X)$A.="&set".urlencode("[".bracket_escape($e)."]")."=".urlencode($L[$X]);echo"<a href='".h($A)."' title='".lang(36)."'>+</a> ";}}}function
selectQuery($I,$mf){return"<!--\n".str_replace("--","--><!-- ",$I)."\n($mf)\n-->\n";}function
rowDescription($R){foreach(fields($R)as$p){if(preg_match("~varchar|character varying~",$p["type"]))return
idf_escape($p["field"]);}return"";}function
rowDescriptions($M,$gc){$K=$M;foreach($M[0]as$z=>$X){if(list($R,$u,$D)=$this->_foreignColumn($gc,$z)){$Cc=array();foreach($M
as$L)$Cc[$L[$z]]=q($L[$z]);$sb=$this->_values[$R];if(!$sb)$sb=get_key_vals("SELECT $u, $D FROM ".table($R)." WHERE $u IN (".implode(", ",$Cc).")");foreach($M
as$yd=>$L){if(isset($L[$z]))$K[$yd][$z]=(string)$sb[$L[$z]];}}}return$K;}function
selectLink($X,$p){}function
selectVal($X,$A,$p,$Qd){$K=($X===null?"&nbsp;":$X);$A=h($A);if(preg_match('~blob|bytea~',$p["type"])&&!is_utf8($X)){$K=lang(37,strlen($Qd));if(preg_match("~^(GIF|\xFF\xD8\xFF|\x89PNG\x0D\x0A\x1A\x0A)~",$Qd))$K="<img src='$A' alt='$K'>";}if(like_bool($p)&&$K!="&nbsp;")$K=($X?lang(38):lang(39));if($A)$K="<a href='$A'".(is_url($A)?" rel='noreferrer'":"").">$K</a>";if(!$A&&!like_bool($p)&&preg_match('~int|float|double|decimal~',$p["type"]))$K="<div class='number'>$K</div>";elseif(preg_match('~date~',$p["type"]))$K="<div class='datetime'>$K</div>";return$K;}function
editVal($X,$p){if(preg_match('~date|timestamp~',$p["type"])&&$X!==null)return
preg_replace('~^(\\d{2}(\\d+))-(0?(\\d+))-(0?(\\d+))~',lang(40),$X);return$X;}function
selectColumnsPrint($N,$f){}function
selectSearchPrint($Z,$f,$x){$Z=(array)$_GET["where"];echo'<fieldset id="fieldset-search"><legend>'.lang(41)."</legend><div>\n";$Wc=array();foreach($Z
as$z=>$X)$Wc[$X["col"]]=$z;$t=0;$q=fields($_GET["select"]);foreach($f
as$D=>$rb){$p=$q[$D];if(preg_match("~enum~",$p["type"])||like_bool($p)){$z=$Wc[$D];$t--;echo"<div>".h($rb)."<input type='hidden' name='where[$t][col]' value='".h($D)."'>:",(like_bool($p)?" <select name='where[$t][val]'>".optionlist(array(""=>"",lang(39),lang(38)),$Z[$z]["val"],true)."</select>":enum_input("checkbox"," name='where[$t][val][]'",$p,(array)$Z[$z]["val"],($p["null"]?0:null))),"</div>\n";unset($f[$D]);}elseif(is_array($Nd=$this->_foreignKeyOptions($_GET["select"],$D))){if($q[$D]["null"])$Nd[0]='('.lang(7).')';$z=$Wc[$D];$t--;echo"<div>".h($rb)."<input type='hidden' name='where[$t][col]' value='".h($D)."'><input type='hidden' name='where[$t][op]' value='='>: <select name='where[$t][val]'>".optionlist($Nd,$Z[$z]["val"],true)."</select></div>\n";unset($f[$D]);}}$t=0;foreach($Z
as$X){if(($X["col"]==""||$f[$X["col"]])&&"$X[col]$X[val]"!=""){echo"<div><select name='where[$t][col]'><option value=''>(".lang(42).")".optionlist($f,$X["col"],true)."</select>",html_select("where[$t][op]",array(-1=>"")+$this->operators,$X["op"]),"<input type='search' name='where[$t][val]' value='".h($X["val"])."' onkeydown='selectSearchKeydown(this, event);' onsearch='selectSearchSearch(this);'></div>\n";$t++;}}echo"<div><select name='where[$t][col]' onchange='this.nextSibling.nextSibling.onchange();'><option value=''>(".lang(42).")".optionlist($f,null,true)."</select>",html_select("where[$t][op]",array(-1=>"")+$this->operators),"<input type='search' name='where[$t][val]' onchange='selectAddRow(this);' onsearch='selectSearch(this);'></div>\n","</div></fieldset>\n";}function
selectOrderPrint($E,$f,$x){$Pd=array();foreach($x
as$z=>$w){$E=array();foreach($w["columns"]as$X)$E[]=$f[$X];if(count(array_filter($E,'strlen'))>1&&$z!="PRIMARY")$Pd[$z]=implode(", ",$E);}if($Pd){echo'<fieldset><legend>'.lang(43)."</legend><div>","<select name='index_order'>".optionlist(array(""=>"")+$Pd,($_GET["order"][0]!=""?"":$_GET["index_order"]),true)."</select>","</div></fieldset>\n";}if($_GET["order"])echo"<div style='display: none;'>".hidden_fields(array("order"=>array(1=>reset($_GET["order"])),"desc"=>($_GET["desc"]?array(1=>1):array()),))."</div>\n";}function
selectLimitPrint($_){echo"<fieldset><legend>".lang(44)."</legend><div>";echo
html_select("limit",array("","50","100"),$_),"</div></fieldset>\n";}function
selectLengthPrint($kf){}function
selectActionPrint($x){echo"<fieldset><legend>".lang(45)."</legend><div>","<input type='submit' value='".lang(46)."'>","</div></fieldset>\n";}function
selectCommandPrint(){return
true;}function
selectImportPrint(){return
true;}function
selectEmailPrint($Gb,$f){if($Gb){print_fieldset("email",lang(47),$_POST["email_append"]);echo"<div onkeydown=\"eventStop(event); return bodyKeydown(event, 'email');\">\n","<p>".lang(48).": <input name='email_from' value='".h($_POST?$_POST["email_from"]:$_COOKIE["adminer_email"])."'>\n",lang(49).": <input name='email_subject' value='".h($_POST["email_subject"])."'>\n","<p><textarea name='email_message' rows='15' cols='75'>".h($_POST["email_message"].($_POST["email_append"]?'{$'."$_POST[email_addition]}":""))."</textarea>\n","<p onkeydown=\"eventStop(event); return bodyKeydown(event, 'email_append');\">".html_select("email_addition",$f,$_POST["email_addition"])."<input type='submit' name='email_append' value='".lang(11)."'>\n";echo"<p>".lang(50).": <input type='file' name='email_files[]' onchange=\"this.onchange = function () { }; var el = this.cloneNode(true); el.value = ''; this.parentNode.appendChild(el);\">","<p>".(count($Gb)==1?'<input type="hidden" name="email_field" value="'.h(key($Gb)).'">':html_select("email_field",$Gb)),"<input type='submit' name='email' value='".lang(51)."' onclick=\"return this.form['delete'].onclick();\">\n","</div>\n","</div></fieldset>\n";}}function
selectColumnsProcess($f,$x){return
array(array(),array());}function
selectSearchProcess($q,$x){$K=array();foreach((array)$_GET["where"]as$z=>$Z){$Ya=$Z["col"];$Jd=$Z["op"];$X=$Z["val"];if(($z<0?"":$Ya).$X!=""){$db=array();foreach(($Ya!=""?array($Ya=>$q[$Ya]):$q)as$D=>$p){if($Ya!=""||is_numeric($X)||!preg_match('~int|float|double|decimal~',$p["type"])){$D=idf_escape($D);if($Ya!=""&&$p["type"]=="enum")$db[]=(in_array(0,$X)?"$D IS NULL OR ":"")."$D IN (".implode(", ",array_map('intval',$X)).")";else{$lf=preg_match('~char|text|enum|set~',$p["type"]);$Y=$this->processInput($p,(!$Jd&&$lf&&preg_match('~^[^%]+$~',$X)?"%$X%":$X));$db[]=$D.($Y=="NULL"?" IS".($Jd==">="?" NOT":"")." $Y":(in_array($Jd,$this->operators)||$Jd=="="?" $Jd $Y":($lf?" LIKE $Y":" IN (".str_replace(",","', '",$Y).")")));if($z<0&&$X=="0")$db[]="$D IS NULL";}}}$K[]=($db?"(".implode(" OR ",$db).")":"0");}}return$K;}function
selectOrderProcess($q,$x){$Fc=$_GET["index_order"];if($Fc!="")unset($_GET["order"][1]);if($_GET["order"])return
array(idf_escape(reset($_GET["order"])).($_GET["desc"]?" DESC":""));foreach(($Fc!=""?array($x[$Fc]):$x)as$w){if($Fc!=""||$w["type"]=="INDEX"){$tc=array_filter($w["descs"]);$rb=false;foreach($w["columns"]as$X){if(preg_match('~date|timestamp~',$q[$X]["type"])){$rb=true;break;}}$K=array();foreach($w["columns"]as$z=>$X)$K[]=idf_escape($X).(($tc?$w["descs"][$z]:$rb)?" DESC":"");return$K;}}return
array();}function
selectLimitProcess(){return(isset($_GET["limit"])?$_GET["limit"]:"50");}function
selectLengthProcess(){return"100";}function
selectEmailProcess($Z,$gc){if($_POST["email_append"])return
true;if($_POST["email"]){$Je=0;if($_POST["all"]||$_POST["check"]){$p=idf_escape($_POST["email_field"]);$Ze=$_POST["email_subject"];$rd=$_POST["email_message"];preg_match_all('~\\{\\$([a-z0-9_]+)\\}~i',"$Ze.$rd",$C);$M=get_rows("SELECT DISTINCT $p".($C[1]?", ".implode(", ",array_map('idf_escape',array_unique($C[1]))):"")." FROM ".table($_GET["select"])." WHERE $p IS NOT NULL AND $p != ''".($Z?" AND ".implode(" AND ",$Z):"").($_POST["all"]?"":" AND ((".implode(") OR (",array_map('where_check',(array)$_POST["check"]))."))"));$q=fields($_GET["select"]);foreach($this->rowDescriptions($M,$gc)as$L){$we=array('{\\'=>'{');foreach($C[1]as$X)$we['{$'."$X}"]=$this->editVal($L[$X],$q[$X]);$Fb=$L[$_POST["email_field"]];if(is_mail($Fb)&&send_mail($Fb,strtr($Ze,$we),strtr($rd,$we),$_POST["email_from"],$_FILES["email_files"]))$Je++;}}cookie("adminer_email",$_POST["email_from"]);redirect(remove_from_uri(),lang(52,$Je));}return
false;}function
selectQueryBuild($N,$Z,$s,$E,$_,$F){return"";}function
messageQuery($I,$mf){return" <span class='time'>".@date("H:i:s")."</span><!--\n".str_replace("--","--><!-- ",$I)."\n".($mf?"($mf)\n":"")."-->";}function
editFunctions($p){$K=array();if($p["null"]&&preg_match('~blob~',$p["type"]))$K["NULL"]=lang(7);$K[""]=($p["null"]||$p["auto_increment"]||like_bool($p)?"":"*");if(preg_match('~date|time~',$p["type"]))$K["now"]=lang(53);if(preg_match('~_(md5|sha1)$~i',$p["field"],$B))$K[]=strtolower($B[1]);return$K;}function
editInput($R,$p,$Ba,$Y){if($p["type"]=="enum")return(isset($_GET["select"])?"<label><input type='radio'$Ba value='-1' checked><i>".lang(8)."</i></label> ":"").enum_input("radio",$Ba,$p,($Y||isset($_GET["select"])?$Y:0),($p["null"]?"":null));$Nd=$this->_foreignKeyOptions($R,$p["field"],$Y);if($Nd!==null)return(is_array($Nd)?"<select$Ba>".optionlist($Nd,$Y,true)."</select>":"<input value='".h($Y)."'$Ba class='hidden'><input value='".h($Nd)."' class='jsonly' onkeyup=\"whisper('".h(ME."script=complete&source=".urlencode($R)."&field=".urlencode($p["field"]))."&value=', this);\"><div onclick='return whisperClick(event, this.previousSibling);'></div>");if(like_bool($p))return'<input type="checkbox" value="'.h($Y?$Y:1).'"'.($Y?' checked':'')."$Ba>";$yc="";if(preg_match('~time~',$p["type"]))$yc=lang(54);if(preg_match('~date|timestamp~',$p["type"]))$yc=lang(55).($yc?" [$yc]":"");if($yc)return"<input value='".h($Y)."'$Ba> ($yc)";if(preg_match('~_(md5|sha1)$~i',$p["field"]))return"<input type='password' value='".h($Y)."'$Ba>";return'';}function
processInput($p,$Y,$r=""){if($r=="now")return"$r()";$K=$Y;if(preg_match('~date|timestamp~',$p["type"])&&preg_match('(^'.str_replace('\\$1','(?P<p1>\\d*)',preg_replace('~(\\\\\\$([2-6]))~','(?P<p\\2>\\d{1,2})',preg_quote(lang(40)))).'(.*))',$Y,$B))$K=($B["p1"]!=""?$B["p1"]:($B["p2"]!=""?($B["p2"]<70?20:19).$B["p2"]:gmdate("Y")))."-$B[p3]$B[p4]-$B[p5]$B[p6]".end($B);$K=($p["type"]=="bit"&&preg_match('~^[0-9]+$~',$Y)?$K:q($K));if($Y==""&&like_bool($p))$K="0";elseif($Y==""&&($p["null"]||!preg_match('~char|text~',$p["type"])))$K="NULL";elseif(preg_match('~^(md5|sha1)$~',$r))$K="$r($K)";return
unconvert_field($p,$K);}function
dumpOutput(){return
array();}function
dumpFormat(){return
array('csv'=>'CSV,','csv;'=>'CSV;','tsv'=>'TSV');}function
dumpDatabase($m){}function
dumpTable(){echo"\xef\xbb\xbf";}function
dumpData($R,$Ye,$I){global$h;$J=$h->query($I,1);if($J){while($L=$J->fetch_assoc()){if($Ye=="table"){dump_csv(array_keys($L));$Ye="INSERT";}dump_csv($L);}}}function
dumpFilename($Bc){return
friendly_url($Bc);}function
dumpHeaders($Bc,$wd=false){$Sb="csv";header("Content-Type: text/csv; charset=utf-8");return$Sb;}function
homepage(){return
true;}function
navigation($vd){global$ca;echo'<h1>
',$this->name(),' <span class="version">',$ca,'</span>
<a href="http://www.adminer.org/editor/#download" target="_blank" id="version">',(version_compare($ca,$_COOKIE["adminer_version"])<0?h($_COOKIE["adminer_version"]):""),'</a>
</h1>
';if($vd=="auth"){$cc=true;foreach((array)$_SESSION["pwds"]as$Qf=>$Ne){foreach($Ne[""]as$V=>$H){if($H!==null){if($cc){echo"<p id='logins' onmouseover='menuOver(this, event);' onmouseout='menuOut(this);'>\n";$cc=false;}echo"<a href='".h(auth_url($Qf,"",$V))."'>".($V!=""?h($V):"<i>".lang(7)."</i>")."</a><br>\n";}}}}else{$this->databasesPrint($vd);if($vd!="db"&&$vd!="ns"){$S=table_status('',true);if(!$S)echo"<p class='message'>".lang(9)."\n";else$this->tablesPrint($S);}}}function
databasesPrint($vd){}function
tablesPrint($T){echo"<p id='tables' onmouseover='menuOver(this, event);' onmouseout='menuOut(this);'>\n";foreach($T
as$L){$D=$this->tableName($L);if(isset($L["Engine"])&&$D!="")echo"<a href='".h(ME).'select='.urlencode($L["Name"])."'".bold($_GET["select"]==$L["Name"]||$_GET["edit"]==$L["Name"])." title='".lang(56)."'>$D</a><br>\n";}}function
_foreignColumn($gc,$e){foreach((array)$gc[$e]as$fc){if(count($fc["source"])==1){$D=$this->rowDescription($fc["table"]);if($D!=""){$u=idf_escape($fc["target"][0]);return
array($fc["table"],$u,$D);}}}}function
_foreignKeyOptions($R,$e,$Y=null){global$h;if(list($hf,$u,$D)=$this->_foreignColumn(column_foreign_keys($R),$e)){$K=&$this->_values[$hf];if($K===null){$S=table_status($hf);$K=($S["Rows"]>1000?"":array(""=>"")+get_key_vals("SELECT $u, $D FROM ".table($hf)." ORDER BY 2"));}if(!$K&&$Y!==null)return$h->result("SELECT $D FROM ".table($hf)." WHERE $u = ".q($Y));return$K;}}}$b=(function_exists('adminer_object')?adminer_object():new
Adminer);function
page_header($pf,$o="",$Pa=array(),$qf=""){global$ba,$ca,$b,$yb,$y;page_headers();$rf=$pf.($qf!=""?": $qf":"");$sf=strip_tags($rf.(SERVER!=""&&SERVER!="localhost"?h(" - ".SERVER):"")." - ".$b->name());echo'<!DOCTYPE html>
<html lang="',$ba,'" dir="',lang(57),'">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Content-Script-Type" content="text/javascript">
<meta name="robots" content="noindex">
<title>',$sf,'</title>
<link rel="stylesheet" type="text/css" href="',h(preg_replace("~\\?.*~","",ME))."?file=default.css&amp;version=4.1.0",'">
<script type="text/javascript" src="',h(preg_replace("~\\?.*~","",ME))."?file=functions.js&amp;version=4.1.0",'"></script>
';if($b->head()){echo'<link rel="shortcut icon" type="image/x-icon" href="',h(preg_replace("~\\?.*~","",ME))."?file=favicon.ico&amp;version=4.1.0",'">
<link rel="apple-touch-icon" href="',h(preg_replace("~\\?.*~","",ME))."?file=favicon.ico&amp;version=4.1.0",'">
';if(file_exists("adminer.css")){echo'<link rel="stylesheet" type="text/css" href="adminer.css">
';}}echo'
<body class="',lang(57),' nojs" onkeydown="bodyKeydown(event);" onclick="bodyClick(event);"',(isset($_COOKIE["adminer_version"])?"":" onload=\"verifyVersion('$ca');\""),'>
<script type="text/javascript">
document.body.className = document.body.className.replace(/ nojs/, \' js\');
</script>

<div id="help" class="jush-',$y,' jsonly hidden" onmouseover="helpOpen = 1;" onmouseout="helpMouseout(this, event);"></div>

<div id="content">
';if($Pa!==null){$A=substr(preg_replace('~\b(username|db|ns)=[^&]*&~','',ME),0,-1);echo'<p id="breadcrumb"><a href="'.h($A?$A:".").'">'.$yb[DRIVER].'</a> &raquo; ';$A=substr(preg_replace('~\b(db|ns)=[^&]*&~','',ME),0,-1);$O=(SERVER!=""?h(SERVER):lang(58));if($Pa===false)echo"$O\n";else{echo"<a href='".($A?h($A):".")."' accesskey='1' title='Alt+Shift+1'>$O</a> &raquo; ";if($_GET["ns"]!=""||(DB!=""&&is_array($Pa)))echo'<a href="'.h($A."&db=".urlencode(DB).(support("scheme")?"&ns=":"")).'">'.h(DB).'</a> &raquo; ';if(is_array($Pa)){if($_GET["ns"]!="")echo'<a href="'.h(substr(ME,0,-1)).'">'.h($_GET["ns"]).'</a> &raquo; ';foreach($Pa
as$z=>$X){$rb=(is_array($X)?$X[1]:h($X));if($rb!="")echo"<a href='".h(ME."$z=").urlencode(is_array($X)?$X[0]:$X)."'>$rb</a> &raquo; ";}}echo"$pf\n";}}echo"<h2>$rf</h2>\n";restart_session();page_messages($o);$l=&get_session("dbs");if(DB!=""&&$l&&!in_array(DB,$l,true))$l=null;stop_session();define("PAGE_HEADER",1);}function
page_headers(){global$b;header("Content-Type: text/html; charset=utf-8");header("Cache-Control: no-cache");if($b->headers()){header("X-Frame-Options: deny");header("X-XSS-Protection: 0");}}function
page_messages($o){$Lf=preg_replace('~^[^?]*~','',$_SERVER["REQUEST_URI"]);$sd=$_SESSION["messages"][$Lf];if($sd){echo"<div class='message'>".implode("</div>\n<div class='message'>",$sd)."</div>\n";unset($_SESSION["messages"][$Lf]);}if($o)echo"<div class='error'>$o</div>\n";}function
page_footer($vd=""){global$b,$uf;echo'</div>

';switch_lang();if($vd!="auth"){echo'<form action="" method="post">
<p class="logout">
<input type="submit" name="logout" value="',lang(59),'" id="logout">
<input type="hidden" name="token" value="',$uf,'">
</p>
</form>
';}echo'<div id="menu">
';$b->navigation($vd);echo'</div>
<script type="text/javascript">setupSubmitHighlight(document);</script>
';}function
int32($yd){while($yd>=2147483648)$yd-=4294967296;while($yd<=-2147483649)$yd+=4294967296;return(int)$yd;}function
long2str($W,$Vf){$Ce='';foreach($W
as$X)$Ce.=pack('V',$X);if($Vf)return
substr($Ce,0,end($W));return$Ce;}function
str2long($Ce,$Vf){$W=array_values(unpack('V*',str_pad($Ce,4*ceil(strlen($Ce)/4),"\0")));if($Vf)$W[]=strlen($Ce);return$W;}function
xxtea_mx($bg,$ag,$bf,$Sc){return
int32((($bg>>5&0x7FFFFFF)^$ag<<2)+(($ag>>3&0x1FFFFFFF)^$bg<<4))^int32(($bf^$ag)+($Sc^$bg));}function
encrypt_string($We,$z){if($We=="")return"";$z=array_values(unpack("V*",pack("H*",md5($z))));$W=str2long($We,true);$yd=count($W)-1;$bg=$W[$yd];$ag=$W[0];$le=floor(6+52/($yd+1));$bf=0;while($le-->0){$bf=int32($bf+0x9E3779B9);$Bb=$bf>>2&3;for($Td=0;$Td<$yd;$Td++){$ag=$W[$Td+1];$xd=xxtea_mx($bg,$ag,$bf,$z[$Td&3^$Bb]);$bg=int32($W[$Td]+$xd);$W[$Td]=$bg;}$ag=$W[0];$xd=xxtea_mx($bg,$ag,$bf,$z[$Td&3^$Bb]);$bg=int32($W[$yd]+$xd);$W[$yd]=$bg;}return
long2str($W,false);}function
decrypt_string($We,$z){if($We=="")return"";if(!$z)return
false;$z=array_values(unpack("V*",pack("H*",md5($z))));$W=str2long($We,false);$yd=count($W)-1;$bg=$W[$yd];$ag=$W[0];$le=floor(6+52/($yd+1));$bf=int32($le*0x9E3779B9);while($bf){$Bb=$bf>>2&3;for($Td=$yd;$Td>0;$Td--){$bg=$W[$Td-1];$xd=xxtea_mx($bg,$ag,$bf,$z[$Td&3^$Bb]);$ag=int32($W[$Td]-$xd);$W[$Td]=$ag;}$bg=$W[$yd];$xd=xxtea_mx($bg,$ag,$bf,$z[$Td&3^$Bb]);$ag=int32($W[0]-$xd);$W[0]=$ag;$bf=int32($bf-0x9E3779B9);}return
long2str($W,true);}$h='';$vc=$_SESSION["token"];if(!$vc)$_SESSION["token"]=rand(1,1e6);$uf=get_token();$Zd=array();if($_COOKIE["adminer_permanent"]){foreach(explode(" ",$_COOKIE["adminer_permanent"])as$X){list($z)=explode(":",$X);$Zd[$z]=$X;}}function
add_invalid_login(){global$b;$Zb=get_temp_dir()."/adminer.invalid";$mc=@fopen($Zb,"r+");if(!$mc){$mc=@fopen($Zb,"w");if(!$mc)return;}flock($mc,LOCK_EX);$Oc=unserialize(stream_get_contents($mc));$mf=time();if($Oc){foreach($Oc
as$Pc=>$X){if($X[0]<$mf)unset($Oc[$Pc]);}}$Nc=&$Oc[$b->bruteForceKey()];if(!$Nc)$Nc=array($mf+30*60,0);$Nc[1]++;$Le=serialize($Oc);rewind($mc);fwrite($mc,$Le);ftruncate($mc,strlen($Le));flock($mc,LOCK_UN);fclose($mc);}$Ca=$_POST["auth"];if($Ca){$Oc=unserialize(@file_get_contents(get_temp_dir()."/adminer.invalid"));$Nc=$Oc[$b->bruteForceKey()];$Ad=($Nc[1]>30?$Nc[0]-time():0);if($Ad>0)auth_error(lang(60,ceil($Ad/60)));session_regenerate_id();$n=$Ca["driver"];$O=$Ca["server"];$V=$Ca["username"];$H=(string)$Ca["password"];$m=$Ca["db"];set_password($n,$O,$V,$H);$_SESSION["db"][$n][$O][$V][$m]=true;if($Ca["permanent"]){$z=base64_encode($n)."-".base64_encode($O)."-".base64_encode($V)."-".base64_encode($m);$ie=$b->permanentLogin(true);$Zd[$z]="$z:".base64_encode($ie?encrypt_string($H,$ie):"");cookie("adminer_permanent",implode(" ",$Zd));}if(count($_POST)==1||DRIVER!=$n||SERVER!=$O||$_GET["username"]!==$V||DB!=$m)redirect(auth_url($n,$O,$V,$m));}elseif($_POST["logout"]){if($vc&&!verify_token()){page_header(lang(59),lang(61));page_footer("db");exit;}else{foreach(array("pwds","db","dbs","queries")as$z)set_session($z,null);unset_permanent();redirect(substr(preg_replace('~\b(username|db|ns)=[^&]*&~','',ME),0,-1),lang(62));}}elseif($Zd&&!$_SESSION["pwds"]){session_regenerate_id();$ie=$b->permanentLogin();foreach($Zd
as$z=>$X){list(,$Ua)=explode(":",$X);list($Qf,$O,$V,$m)=array_map('base64_decode',explode("-",$z));set_password($Qf,$O,$V,decrypt_string(base64_decode($Ua),$ie));$_SESSION["db"][$Qf][$O][$V][$m]=true;}}function
unset_permanent(){global$Zd;foreach($Zd
as$z=>$X){list($Qf,$O,$V,$m)=array_map('base64_decode',explode("-",$z));if($Qf==DRIVER&&$O==SERVER&&$V==$_GET["username"]&&$m==DB)unset($Zd[$z]);}cookie("adminer_permanent",implode(" ",$Zd));}function
auth_error($o){global$b,$vc;$Oe=session_name();if(!$_COOKIE[$Oe]&&$_GET[$Oe]&&ini_bool("session.use_only_cookies"))$o=lang(63);elseif(isset($_GET["username"])){if(($_COOKIE[$Oe]||$_GET[$Oe])&&!$vc)$o=lang(64);else{add_invalid_login();$H=get_password();if($H!==null){if($H===false)$o.='<br>'.lang(65,'<code>permanentLogin()</code>');set_password(DRIVER,SERVER,$_GET["username"],null);}unset_permanent();}}$G=session_get_cookie_params();cookie("adminer_key",($_COOKIE["adminer_key"]?$_COOKIE["adminer_key"]:rand_string()),$G["lifetime"]);page_header(lang(34),$o,null);echo"<form action='' method='post'>\n";$b->loginForm();echo"<div>";hidden_fields($_POST,array("auth"));echo"</div>\n","</form>\n";page_footer("auth");exit;}if(isset($_GET["username"])){if(!class_exists("Min_DB")){unset($_SESSION["pwds"][DRIVER]);unset_permanent();page_header(lang(66),lang(67,implode(", ",$de)),false);page_footer("auth");exit;}$h=connect();}$n=new
Min_Driver($h);if(!is_object($h)||!$b->login($_GET["username"],get_password()))auth_error((is_string($h)?$h:lang(68)));if($Ca&&$_POST["token"])$_POST["token"]=$uf;$o='';if($_POST){if(!verify_token()){$Jc="max_input_vars";$pd=ini_get($Jc);if(extension_loaded("suhosin")){foreach(array("suhosin.request.max_vars","suhosin.post.max_vars")as$z){$X=ini_get($z);if($X&&(!$pd||$X<$pd)){$Jc=$z;$pd=$X;}}}$o=(!$_POST["token"]&&$pd?lang(69,"'$Jc'"):lang(61));}}elseif($_SERVER["REQUEST_METHOD"]=="POST"){$o=lang(70,"'post_max_size'");if(isset($_GET["sql"]))$o.=' '.lang(71);}if(!ini_bool("session.use_cookies")||@ini_set("session.use_cookies",false)!==false)session_write_close();function
email_header($wc){return"=?UTF-8?B?".base64_encode($wc)."?=";}function
send_mail($Fb,$Ze,$rd,$nc="",$ac=array()){$Lb=(DIRECTORY_SEPARATOR=="/"?"\n":"\r\n");$rd=str_replace("\n",$Lb,wordwrap(str_replace("\r","","$rd\n")));$Oa=uniqid("boundary");$_a="";foreach((array)$ac["error"]as$z=>$X){if(!$X)$_a.="--$Oa$Lb"."Content-Type: ".str_replace("\n","",$ac["type"][$z]).$Lb."Content-Disposition: attachment; filename=\"".preg_replace('~["\\n]~','',$ac["name"][$z])."\"$Lb"."Content-Transfer-Encoding: base64$Lb$Lb".chunk_split(base64_encode(file_get_contents($ac["tmp_name"][$z])),76,$Lb).$Lb;}$Ja="";$xc="Content-Type: text/plain; charset=utf-8$Lb"."Content-Transfer-Encoding: 8bit";if($_a){$_a.="--$Oa--$Lb";$Ja="--$Oa$Lb$xc$Lb$Lb";$xc="Content-Type: multipart/mixed; boundary=\"$Oa\"";}$xc.=$Lb."MIME-Version: 1.0$Lb"."X-Mailer: Adminer Editor".($nc?$Lb."From: ".str_replace("\n","",$nc):"");return
mail($Fb,email_header($Ze),$Ja.$rd.$_a,$xc);}function
like_bool($p){return
preg_match("~bool|(tinyint|bit)\\(1\\)~",$p["full_type"]);}$h->select_db($b->database());$Gd="RESTRICT|NO ACTION|CASCADE|SET NULL|SET DEFAULT";$yb[DRIVER]=lang(34);if(isset($_GET["select"])&&($_POST["edit"]||$_POST["clone"])&&!$_POST["save"])$_GET["edit"]=$_GET["select"];if(isset($_GET["download"])){$a=$_GET["download"];$q=fields($a);header("Content-Type: application/octet-stream");header("Content-Disposition: attachment; filename=".friendly_url("$a-".implode("_",$_GET["where"])).".".friendly_url($_GET["field"]));$N=array(idf_escape($_GET["field"]));$J=$n->select($a,$N,array(where($_GET,$q)),$N);$L=($J?$J->fetch_row():array());echo$L[0];exit;}elseif(isset($_GET["edit"])){$a=$_GET["edit"];$q=fields($a);$Z=(isset($_GET["select"])?(count($_POST["check"])==1?where_check($_POST["check"][0],$q):""):where($_GET,$q));$Kf=(isset($_GET["select"])?$_POST["edit"]:$Z);foreach($q
as$D=>$p){if(!isset($p["privileges"][$Kf?"update":"insert"])||$b->fieldName($p)=="")unset($q[$D]);}if($_POST&&!$o&&!isset($_GET["select"])){$hd=$_POST["referer"];if($_POST["insert"])$hd=($Kf?null:$_SERVER["REQUEST_URI"]);elseif(!preg_match('~^.+&select=.+$~',$hd))$hd=ME."select=".urlencode($a);$x=indexes($a);$Ff=unique_array($_GET["where"],$x);$oe="\nWHERE $Z";if(isset($_POST["delete"]))queries_redirect($hd,lang(72),$n->delete($a,$oe,!$Ff));else{$P=array();foreach($q
as$D=>$p){$X=process_input($p);if($X!==false&&$X!==null)$P[idf_escape($D)]=$X;}if($Kf){if(!$P)redirect($hd);queries_redirect($hd,lang(73),$n->update($a,$P,$oe,!$Ff));if(is_ajax()){page_headers();page_messages($o);exit;}}else{$J=$n->insert($a,$P);$cd=($J?last_id():0);queries_redirect($hd,lang(74,($cd?" $cd":"")),$J);}}}$L=null;if($_POST["save"])$L=(array)$_POST["fields"];elseif($Z){$N=array();foreach($q
as$D=>$p){if(isset($p["privileges"]["select"])){$ya=convert_field($p);if($_POST["clone"]&&$p["auto_increment"])$ya="''";if($y=="sql"&&preg_match("~enum|set~",$p["type"]))$ya="1*".idf_escape($D);$N[]=($ya?"$ya AS ":"").idf_escape($D);}}$L=array();if(!support("table"))$N=array("*");if($N){$J=$n->select($a,$N,array($Z),$N,array(),(isset($_GET["select"])?2:1));$L=$J->fetch_assoc();if(!$L)$L=false;if(isset($_GET["select"])&&(!$L||$J->fetch_assoc()))$L=null;}}if(!support("table")&&!$q){if(!$Z){$J=$n->select($a,array("*"),$Z,array("*"));$L=($J?$J->fetch_assoc():false);if(!$L)$L=array($n->primary=>"");}if($L){foreach($L
as$z=>$X){if(!$Z)$L[$z]=null;$q[$z]=array("field"=>$z,"null"=>($z!=$n->primary),"auto_increment"=>($z==$n->primary));}}}edit_form($a,$q,$L,$Kf);}elseif(isset($_GET["select"])){$a=$_GET["select"];$S=table_status1($a);$x=indexes($a);$q=fields($a);$ic=column_foreign_keys($a);$Fd="";if($S["Oid"]){$Fd=($y=="sqlite"?"rowid":"oid");$x[]=array("type"=>"PRIMARY","columns"=>array($Fd));}parse_str($_COOKIE["adminer_import"],$ra);$Ae=array();$f=array();$kf=null;foreach($q
as$z=>$p){$D=$b->fieldName($p);if(isset($p["privileges"]["select"])&&$D!=""){$f[$z]=html_entity_decode(strip_tags($D),ENT_QUOTES);if(is_shortable($p))$kf=$b->selectLengthProcess();}$Ae+=$p["privileges"];}list($N,$s)=$b->selectColumnsProcess($f,$x);$Qc=count($s)<count($N);$Z=$b->selectSearchProcess($q,$x);$E=$b->selectOrderProcess($q,$x);$_=$b->selectLimitProcess();$nc=($N?implode(", ",$N):"*".($Fd?", $Fd":"")).convert_fields($f,$q,$N)."\nFROM ".table($a);$qc=($s&&$Qc?"\nGROUP BY ".implode(", ",$s):"").($E?"\nORDER BY ".implode(", ",$E):"");if($_GET["val"]&&is_ajax()){header("Content-Type: text/plain; charset=utf-8");foreach($_GET["val"]as$Gf=>$L){$ya=convert_field($q[key($L)]);$N=array($ya?$ya:idf_escape(key($L)));$Z[]=where_check($Gf,$q);$K=$n->select($a,$N,$Z,$N);if($K)echo
reset($K->fetch_row());}exit;}if($_POST&&!$o){$Xf=$Z;if(!$_POST["all"]&&is_array($_POST["check"])){$Sa=array();foreach($_POST["check"]as$Qa)$Sa[]=where_check($Qa,$q);$Xf[]="((".implode(") OR (",$Sa)."))";}$Xf=($Xf?"\nWHERE ".implode(" AND ",$Xf):"");$fe=$If=null;foreach($x
as$w){if($w["type"]=="PRIMARY"){$fe=array_flip($w["columns"]);$If=($N?$fe:array());break;}}foreach((array)$If
as$z=>$X){if(in_array(idf_escape($z),$N))unset($If[$z]);}if($_POST["export"]){cookie("adminer_import","output=".urlencode($_POST["output"])."&format=".urlencode($_POST["format"]));dump_headers($a);$b->dumpTable($a,"");if(!is_array($_POST["check"])||$If===array())$I="SELECT $nc$Xf$qc";else{$Ef=array();foreach($_POST["check"]as$X)$Ef[]="(SELECT".limit($nc,"\nWHERE ".($Z?implode(" AND ",$Z)." AND ":"").where_check($X,$q).$qc,1).")";$I=implode(" UNION ALL ",$Ef);}$b->dumpData($a,"table",$I);exit;}if(!$b->selectEmailProcess($Z,$ic)){if($_POST["save"]||$_POST["delete"]){$J=true;$sa=0;$P=array();if(!$_POST["delete"]){foreach($f
as$D=>$X){$X=process_input($q[$D]);if($X!==null&&($_POST["clone"]||$X!==false))$P[idf_escape($D)]=($X!==false?$X:idf_escape($D));}}if($_POST["delete"]||$P){if($_POST["clone"])$I="INTO ".table($a)." (".implode(", ",array_keys($P)).")\nSELECT ".implode(", ",$P)."\nFROM ".table($a);if($_POST["all"]||($If===array()&&is_array($_POST["check"]))||$Qc){$J=($_POST["delete"]?$n->delete($a,$Xf):($_POST["clone"]?queries("INSERT $I$Xf"):$n->update($a,$P,$Xf)));$sa=$h->affected_rows;}else{foreach((array)$_POST["check"]as$X){$Wf="\nWHERE ".($Z?implode(" AND ",$Z)." AND ":"").where_check($X,$q);$J=($_POST["delete"]?$n->delete($a,$Wf,1):($_POST["clone"]?queries("INSERT".limit1($I,$Wf)):$n->update($a,$P,$Wf)));if(!$J)break;$sa+=$h->affected_rows;}}}$rd=lang(75,$sa);if($_POST["clone"]&&$J&&$sa==1){$cd=last_id();if($cd)$rd=lang(74," $cd");}queries_redirect(remove_from_uri($_POST["all"]&&$_POST["delete"]?"page":""),$rd,$J);if(!$_POST["delete"]){edit_form($a,$q,(array)$_POST["fields"],!$_POST["clone"]);page_footer();exit;}}elseif(!$_POST["import"]){if(!$_POST["val"])$o=lang(76);else{$J=true;$sa=0;foreach($_POST["val"]as$Gf=>$L){$P=array();foreach($L
as$z=>$X){$z=bracket_escape($z,1);$P[idf_escape($z)]=(preg_match('~char|text~',$q[$z]["type"])||$X!=""?$b->processInput($q[$z],$X):"NULL");}$J=$n->update($a,$P," WHERE ".($Z?implode(" AND ",$Z)." AND ":"").where_check($Gf,$q),!($Qc||$If===array())," ");if(!$J)break;$sa+=$h->affected_rows;}queries_redirect(remove_from_uri(),lang(75,$sa),$J);}}elseif(!is_string($Yb=get_file("csv_file",true)))$o=upload_error($Yb);elseif(!preg_match('~~u',$Yb))$o=lang(77);else{cookie("adminer_import","output=".urlencode($ra["output"])."&format=".urlencode($_POST["separator"]));$J=true;$ab=array_keys($q);preg_match_all('~(?>"[^"]*"|[^"\\r\\n]+)+~',$Yb,$C);$sa=count($C[0]);$n->begin();$Ke=($_POST["separator"]=="csv"?",":($_POST["separator"]=="tsv"?"\t":";"));$M=array();foreach($C[0]as$z=>$X){preg_match_all("~((?>\"[^\"]*\")+|[^$Ke]*)$Ke~",$X.$Ke,$md);if(!$z&&!array_diff($md[1],$ab)){$ab=$md[1];$sa--;}else{$P=array();foreach($md[1]as$t=>$Ya)$P[idf_escape($ab[$t])]=($Ya==""&&$q[$ab[$t]]["null"]?"NULL":q(str_replace('""','"',preg_replace('~^"|"$~','',$Ya))));$M[]=$P;}}$J=(!$M||$n->insertUpdate($a,$M,$fe));if($J)$n->commit();queries_redirect(remove_from_uri("page"),lang(78,$sa),$J);$n->rollback();}}}$ef=$b->tableName($S);if(is_ajax()){page_headers();ob_start();}else
page_header(lang(46).": $ef",$o);$P=null;if(isset($Ae["insert"])||!support("table")){$P="";foreach((array)$_GET["where"]as$X){if(count($ic[$X["col"]])==1&&($X["op"]=="="||(!$X["op"]&&!preg_match('~[_%]~',$X["val"]))))$P.="&set".urlencode("[".bracket_escape($X["col"])."]")."=".urlencode($X["val"]);}}$b->selectLinks($S,$P);if(!$f&&support("table"))echo"<p class='error'>".lang(79).($q?".":": ".error())."\n";else{echo"<form action='' id='form'>\n","<div style='display: none;'>";hidden_fields_get();echo(DB!=""?'<input type="hidden" name="db" value="'.h(DB).'">'.(isset($_GET["ns"])?'<input type="hidden" name="ns" value="'.h($_GET["ns"]).'">':""):"");echo'<input type="hidden" name="select" value="'.h($a).'">',"</div>\n";$b->selectColumnsPrint($N,$f);$b->selectSearchPrint($Z,$f,$x);$b->selectOrderPrint($E,$f,$x);$b->selectLimitPrint($_);$b->selectLengthPrint($kf);$b->selectActionPrint($x);echo"</form>\n";$F=$_GET["page"];if($F=="last"){$lc=$h->result(count_rows($a,$Z,$Qc,$s));$F=floor(max(0,$lc-1)/$_);}$He=$N;if(!$He){$He[]="*";if($Fd)$He[]=$Fd;}$hb=convert_fields($f,$q,$N);if($hb)$He[]=substr($hb,2);$J=$n->select($a,$He,$Z,$s,$E,$_,$F,true);if(!$J)echo"<p class='error'>".error()."\n";else{if($y=="mssql"&&$F)$J->seek($_*$F);$Hb=array();echo"<form action='' method='post' enctype='multipart/form-data'>\n";$M=array();while($L=$J->fetch_assoc()){if($F&&$y=="oracle")unset($L["RNUM"]);$M[]=$L;}if($_GET["page"]!="last"&&+$_&&$s&&$Qc&&$y=="sql")$lc=$h->result(" SELECT FOUND_ROWS()");if(!$M)echo"<p class='message'>".lang(12)."\n";else{$Ia=$b->backwardKeys($a,$ef);echo"<table id='table' cellspacing='0' class='nowrap checkable' onclick='tableClick(event);' ondblclick='tableClick(event, true);' onkeydown='return editingKeydown(event);'>\n","<thead><tr>".(!$s&&$N?"":"<td><input type='checkbox' id='all-page' onclick='formCheck(this, /check/);'> <a href='".h($_GET["modify"]?remove_from_uri("modify"):$_SERVER["REQUEST_URI"]."&modify=1")."'>".lang(80)."</a>");$zd=array();$pc=array();reset($N);$qe=1;foreach($M[0]as$z=>$X){if($z!=$Fd){$X=$_GET["columns"][key($N)];$p=$q[$N?($X?$X["col"]:current($N)):$z];$D=($p?$b->fieldName($p,$qe):($X["fun"]?"*":$z));if($D!=""){$qe++;$zd[$z]=$D;$e=idf_escape($z);$Ac=remove_from_uri('(order|desc)[^=]*|page').'&order%5B0%5D='.urlencode($z);$rb="&desc%5B0%5D=1";echo'<th onmouseover="columnMouse(this);" onmouseout="columnMouse(this, \' hidden\');">','<a href="'.h($Ac.($E[0]==$e||$E[0]==$z||(!$E&&$Qc&&$s[0]==$e)?$rb:'')).'">';echo
apply_sql_function($X["fun"],$D)."</a>";echo"<span class='column hidden'>","<a href='".h($Ac.$rb)."' title='".lang(81)."' class='text'> â†“</a>";if(!$X["fun"])echo'<a href="#fieldset-search" onclick="selectSearch(\''.h(js_escape($z)).'\'); return false;" title="'.lang(41).'" class="text jsonly"> =</a>';echo"</span>";}$pc[$z]=$X["fun"];next($N);}}$fd=array();if($_GET["modify"]){foreach($M
as$L){foreach($L
as$z=>$X)$fd[$z]=max($fd[$z],min(40,strlen(utf8_decode($X))));}}echo($Ia?"<th>".lang(82):"")."</thead>\n";if(is_ajax()){if($_%2==1&&$F%2==1)odd();ob_end_clean();}foreach($b->rowDescriptions($M,$ic)as$yd=>$L){$Ff=unique_array($M[$yd],$x);if(!$Ff){$Ff=array();foreach($M[$yd]as$z=>$X){if(!preg_match('~^(COUNT\\((\\*|(DISTINCT )?`(?:[^`]|``)+`)\\)|(AVG|GROUP_CONCAT|MAX|MIN|SUM)\\(`(?:[^`]|``)+`\\))$~',$z))$Ff[$z]=$X;}}$Gf="";foreach($Ff
as$z=>$X){if(($y=="sql"||$y=="pgsql")&&strlen($X)>64){$z="MD5(".(strpos($z,'(')?$z:idf_escape($z)).")";$X=md5($X);}$Gf.="&".($X!==null?urlencode("where[".bracket_escape($z)."]")."=".urlencode($X):"null%5B%5D=".urlencode($z));}echo"<tr".odd().">".(!$s&&$N?"":"<td>".checkbox("check[]",substr($Gf,1),in_array(substr($Gf,1),(array)$_POST["check"]),"","this.form['all'].checked = false; formUncheck('all-page');").($Qc||information_schema(DB)?"":" <a href='".h(ME."edit=".urlencode($a).$Gf)."'>".lang(83)."</a>"));foreach($L
as$z=>$X){if(isset($zd[$z])){$p=$q[$z];if($X!=""&&(!isset($Hb[$z])||$Hb[$z]!=""))$Hb[$z]=(is_mail($X)?$zd[$z]:"");$A="";if(preg_match('~blob|bytea|raw|file~',$p["type"])&&$X!="")$A=ME.'download='.urlencode($a).'&field='.urlencode($z).$Gf;if(!$A&&$X!==null){foreach((array)$ic[$z]as$hc){if(count($ic[$z])==1||end($hc["source"])==$z){$A="";foreach($hc["source"]as$t=>$Re)$A.=where_link($t,$hc["target"][$t],$M[$yd][$Re]);$A=($hc["db"]!=""?preg_replace('~([?&]db=)[^&]+~','\\1'.urlencode($hc["db"]),ME):ME).'select='.urlencode($hc["table"]).$A;if(count($hc["source"])==1)break;}}}if($z=="COUNT(*)"){$A=ME."select=".urlencode($a);$t=0;foreach((array)$_GET["where"]as$W){if(!array_key_exists($W["col"],$Ff))$A.=where_link($t++,$W["col"],$W["val"],$W["op"]);}foreach($Ff
as$Sc=>$W)$A.=where_link($t++,$Sc,$W);}$X=select_value($X,$A,$p,$kf);$u=h("val[$Gf][".bracket_escape($z)."]");$Y=$_POST["val"][$Gf][bracket_escape($z)];$Db=!is_array($L[$z])&&is_utf8($X)&&$M[$yd][$z]==$L[$z]&&!$pc[$z];$jf=preg_match('~text|lob~',$p["type"]);if(($_GET["modify"]&&$Db)||$Y!==null){$sc=h($Y!==null?$Y:$L[$z]);echo"<td>".($jf?"<textarea name='$u' cols='30' rows='".(substr_count($L[$z],"\n")+1)."'>$sc</textarea>":"<input name='$u' value='$sc' size='$fd[$z]'>");}else{$jd=strpos($X,"<i>...</i>");echo"<td id='$u' onclick=\"selectClick(this, event, ".($jd?2:($jf?1:0)).($Db?"":", '".h(lang(84))."'").");\">$X";}}}if($Ia)echo"<td>";$b->backwardKeysPrint($Ia,$M[$yd]);echo"</tr>\n";}if(is_ajax())exit;echo"</table>\n";}if(($M||$F)&&!is_ajax()){$Pb=true;if($_GET["page"]!="last"){if(!+$_)$lc=count($M);elseif($y!="sql"||!$Qc){$lc=($Qc?false:found_rows($S,$Z));if($lc<max(1e4,2*($F+1)*$_))$lc=reset(slow_query(count_rows($a,$Z,$Qc,$s)));else$Pb=false;}}if(+$_&&($lc===false||$lc>$_||$F)){echo"<p class='pages'>";$nd=($lc===false?$F+(count($M)>=$_?2:1):floor(($lc-1)/$_));if($y!="simpledb"){echo'<a href="'.h(remove_from_uri("page"))."\" onclick=\"pageClick(this.href, +prompt('".lang(85)."', '".($F+1)."'), event); return false;\">".lang(85)."</a>:",pagination(0,$F).($F>5?" ...":"");for($t=max(1,$F-4);$t<min($nd,$F+5);$t++)echo
pagination($t,$F);if($nd>0){echo($F+5<$nd?" ...":""),($Pb&&$lc!==false?pagination($nd,$F):" <a href='".h(remove_from_uri("page")."&page=last")."' title='~$nd'>".lang(86)."</a>");}echo(($lc===false?count($M)+1:$lc-$F*$_)>$_?' <a href="'.h(remove_from_uri("page")."&page=".($F+1)).'" onclick="return !selectLoadMore(this, '.(+$_).', \''.lang(87).'...\');" class="loadmore">'.lang(88).'</a>':'');}else{echo
lang(85).":",pagination(0,$F).($F>1?" ...":""),($F?pagination($F,$F):""),($nd>$F?pagination($F+1,$F).($nd>$F+1?" ...":""):"");}}echo"<p class='count'>\n",($lc!==false?"(".($Pb?"":"~ ").lang(89,$lc).") ":"");$wb=($Pb?"":"~ ").$lc;echo
checkbox("all",1,0,lang(90),"var checked = formChecked(this, /check/); selectCount('selected', this.checked ? '$wb' : checked); selectCount('selected2', this.checked || !checked ? '$wb' : checked);")."\n";if($b->selectCommandPrint()){echo'<fieldset',($_GET["modify"]?'':' class="jsonly"'),'><legend>',lang(80),'</legend><div>
<input type="submit" value="',lang(14),'"',($_GET["modify"]?'':' title="'.lang(76).'"'),'>
</div></fieldset>
<fieldset><legend>',lang(91),' <span id="selected"></span></legend><div>
<input type="submit" name="edit" value="',lang(10),'">
<input type="submit" name="clone" value="',lang(92),'">
<input type="submit" name="delete" value="',lang(18),'"',confirm(),'>
</div></fieldset>
';}$jc=$b->dumpFormat();foreach((array)$_GET["columns"]as$e){if($e["fun"]){unset($jc['sql']);break;}}if($jc){print_fieldset("export",lang(93)." <span id='selected2'></span>");$Sd=$b->dumpOutput();echo($Sd?html_select("output",$Sd,$ra["output"])." ":""),html_select("format",$jc,$ra["format"])," <input type='submit' name='export' value='".lang(93)."'>\n","</div></fieldset>\n";}echo(!$s&&$N?"":"<script type='text/javascript'>tableCheck();</script>\n");}if($b->selectImportPrint()){print_fieldset("import",lang(94),!$M);echo"<input type='file' name='csv_file'> ",html_select("separator",array("csv"=>"CSV,","csv;"=>"CSV;","tsv"=>"TSV"),$ra["format"],1);echo" <input type='submit' name='import' value='".lang(94)."'>","</div></fieldset>\n";}$b->selectEmailPrint(array_filter($Hb,'strlen'),$f);echo"<p><input type='hidden' name='token' value='$uf'></p>\n","</form>\n";}}if(is_ajax()){ob_end_clean();exit;}}elseif(isset($_GET["script"])){if($_GET["script"]=="kill")$h->query("KILL ".(+$_POST["kill"]));elseif(list($R,$u,$D)=$b->_foreignColumn(column_foreign_keys($_GET["source"]),$_GET["field"])){$_=11;$J=$h->query("SELECT $u, $D FROM ".table($R)." WHERE ".(preg_match('~^[0-9]+$~',$_GET["value"])?"$u = $_GET[value] OR ":"")."$D LIKE ".q("$_GET[value]%")." ORDER BY 2 LIMIT $_");for($t=1;($L=$J->fetch_row())&&$t<$_;$t++)echo"<a href='".h(ME."edit=".urlencode($R)."&where".urlencode("[".bracket_escape(idf_unescape($u))."]")."=".urlencode($L[0]))."'>".h($L[1])."</a><br>\n";if($L)echo"...\n";}exit;}else{page_header(lang(58),"",false);if($b->homepage()){echo"<form action='' method='post'>\n","<p>".lang(95).": <input name='query' value='".h($_POST["query"])."'> <input type='submit' value='".lang(41)."'>\n";if($_POST["query"]!="")search_tables();echo"<table cellspacing='0' class='nowrap checkable' onclick='tableClick(event);'>\n",'<thead><tr class="wrap"><td><input id="check-all" type="checkbox" onclick="formCheck(this, /^tables\[/);"><th>'.lang(96).'<td>'.lang(97)."</thead>\n";foreach(table_status()as$R=>$L){$D=$b->tableName($L);if(isset($L["Engine"])&&$D!=""){echo'<tr'.odd().'><td>'.checkbox("tables[]",$R,in_array($R,(array)$_POST["tables"],true),"","formUncheck('check-all');"),"<th><a href='".h(ME).'select='.urlencode($R)."'>$D</a>";$X=format_number($L["Rows"]);echo"<td align='right'><a href='".h(ME."edit=").urlencode($R)."'>".($L["Engine"]=="InnoDB"&&$X?"~ $X":$X)."</a>";}}echo"</table>\n","<script type='text/javascript'>tableCheck();</script>\n","</form>\n";}}page_footer();