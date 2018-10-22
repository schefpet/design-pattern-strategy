# Strategy - kachny

Pravděpodobně všichni tušíte, že můžete kachny rozdělit mnoha způsoby. Pro tento příklad jsem si zadání vymyslel takto:

Mám 2 typy kachen: městskou a divokou.
2) Kachnu musím umět zobrazit.
3) Kachna umí létat.
4) Kachna umí jíst.

Toto výše budiž první zadání, které si ještě pro ukázání všech pro a proti později rozšíříme.

## [Běžné řešení](common-way)
Většinou si programátor řekne, že potřebuje mít 2 typy kachen a tak si k tomu vytvoří 2 třídy: [CityDuck](common-way/CityDuck.php) a [WildDuck](common-way/WildDuck.php). Do těchto tříd poté vloží implementaci všeho co je v zadání. Jak můžete tedy vidět v souborech na které odkazuji, tak se umí obě kachny zobrazit, umí létat a umí se najíst. No není to krásné? Třídy jsou jednoduché a vídím co a jak dělají, tak kde je problém?
Problémů je hned několik:
* Class explosion - Primární problém proč jsem zvolil tento příklad. Představte si, že si klient usmyslí, že z toho udělá fantasy. Bude chtít dalších 5 typů městských kachen, 20 typů divokých kachen a tak dále. Budete mít desítky nebo stovky tříd na kachny.
* Single responsibility - Vaše třídy by měly dělat jednu věc a v tomto případě umí každá třída kachny úplně všechno.
* Open close principle - Vaše třídy by měly být otevřené pro rozšíření ale uzavřené pro změnu. Nyní když budete chtít změnit způsob letu musíte upravovat přímo jednotlivé třídy kachen a to je špatně.
* Code reuse - Určitě jste si všimli, že metody pro jedení a létání jsou u obou kachen stejné. Vznikl Vám tedy duplicitní kód a ten by bylo fajn vytáhnout, aby byl znovupoužitelný.

No a na konec, když jsme zmínili rozšiřování typů kachen, tak si zákazník usmyslel, že chce [gumovou kačenku](common-way/RubberDuck.php). Takovou tu, co si s ní mohou hrát děti ve vaně. A jsme u dalších problémů:
* Gumová kačenka neumí létat ani jíst.
 
V takovýchto případech nám zbývají tedy 3 způsoby jak to vyřešit:
1) Metody ve třídách necháme prázdné.
2) Do kódu vložíme pár podmínek, aby se dané metody nevolaly pokud jde o typ kachny, která metody neimplementuje.
3) Použijeme na to návrhový vzor strategy.

První dvě možnosti prosím ne. Děláte tím guláš v kódu a nikdo kromě vás to nepochopí a mnohonásobně si tím stěžujete každé další použití.

## Doporučené řešení

1) Vytvořte si pouze [jeden objekt](better-way/Duck.php). Tímto jsme se zbavili class explosion.
2) Vytvořte si strategie na [zobrazení](better-way/DisplayStrategies), [jedení](better-way/EatStrategies) a [létání](better-way/FlyStrategies). Tímto jsme vytvořili třídy, které mají pouze jednu funkci (single responsibility). Třídu [Duck](better-way/Duck.php) jsme udělali otevřenou pro rozšíření, ale uzavřenou pro změny. Vyčlenili duplicitní kód a udělali ho znovupoužitelným.
3) U gumové kačenky jsme použili Null Object Pattern: [nejí](better-way/EatStrategies/DoNotEat.php) a [nelétá](better-way/FlyStrategies/DoNotFly.php). Díky tomu je kód všem v budoucnu jasný a není potřeba používat spousty podmínek.

## Závěr

Někteří z vás by mohli namítnout, že jsem musel vytvořit mnohem více tříd a mnohem více kódu. To je sice pravda, ale výměnou za to jsem dostal čitelnější, jednoduše použitelný a jednoduše rozšířitelný kód.