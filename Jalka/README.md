Jalka EMi leht

Koostatud juunis algava jalgpalli EMi ennustusmäng. Võimaldab mugavalt ennustusi sisestada, neid kontrollida ning jooksvat punktiseisu jälgida.
Toimiv versioon on üleval lingil: http://enos.itcollege.ee/~koiderma/Jalka/
Sisestusleht: http://enos.itcollege.ee/~koiderma/Jalka/JalkaEM.html
Hindamisleht mängu korraldajale: http://enos.itcollege.ee/~koiderma/Jalka/Hinda.php
Tulemusteleht: http://enos.itcollege.ee/~koiderma/Jalka/tulemused.php


Leht koosneb osadest:
 * JalkaEM.html  - siin toimub info sisestus (väravate arv max suurus on piiratud 9 peale)
 * saada.php - saadab sisestatud tulemused serverisse (töötab JalkaEM.html vormi peal)
 * JalkakEM.js - peamiselt kontrollib, kas info on õigesti täidetud sisestuslehel, paigutab võistkonnad alagruppidesse ning hiljem 1/16, veerandfinaalidesse, poolfinaali ja finaali
 * jalkastiil.css - sisestus ja tulemuste lehe stiil
 * Hinda.php - siin saab sisestada tegelikud tulemused, mis saatmise järel arvutab ka uued punktid
 * kalkuleeri.php - arvutab uued punktid iga Hinda lehe sisestuse järel (Hindamise lehe alamosa)
 * tulemused.php - kuvab mängu punktitabeli
 * naited.html - Näitab mängija ennustusi, kui nimel klikata (tulemuste lehe alamosa)
