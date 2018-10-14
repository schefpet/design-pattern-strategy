# Návrhový vzor Strategy
Jedná se o jeden z nejjednodušších návrhových vzorů a zjednodušeně nám říká: Použijte kompozici místo dědění.

## Kdy návrhový vzor použít?
Pokud máte 2 a více algoritmů, které řeší stejnou funkčnost/chování ale jiným způsobem. Důvod je jednoduchý: Pokud byste tyto algoritmy používali v kódu pomocí switche nebo pomocí spousty podmínek, pak ztrácíte přehlednost v kódu a hlavně znovupoužitelnost. 

* Různé algoritmy řazení
* Různé způsoby ukládání dat (různé formáty souborů, různé externí api, ...)
* Různé zobrazování dat (sloupcový graf, koláčový graf, v tabulce, ...)
* Může jít ale také o použití různých algoritmů v závislosti na časovém vymezení (do určitého roku se něco chová jedním způsobem a od určitého roku zase jiným)


## V čem nám pomáhá?

* Udržuje třídy otevřené pro rozšíření (například přidávání dalších algoritmů), ale uzavřené pro změnu (každý další algoritmus je ve vlastní třídě)
* Eliminuje expanzi tříd

## Jak to vypadá v UML?
Vezmu si první z příkladů, kdy návrhový vzor použít. Dejme tomu, že máme nějaká data a potřebujeme je setřídit. Na základě typu dat nám mohou vzniknout například takovéto požadavky:

* Není potřeba řešit náročnost, chci to hlavně hned.
* Potřebuji, aby se mi data setřídila co nejrychleji.
* Potřebuji, aby třídění zabíralo co nejméně paměti.


![SortStrategy UML](images/SortStrategyUML.svg)

## Příklady v kódu
Teorie bylo snad dost, tak se vrhneme na nějakou tu implementaci. U každého příkladu nejdříve ukážu způsob implementace se kterým jsem se setkal a poté jej upravím použitím návrhového vzoru Strategy.


## Závěr
Doufám, že jsem vám pomohl objasnit tento návrhový vzor a budu rád za zpětnou vazbu. Pokud byste něčemu nerozuměli nebo měli návrh na zlepšení, tak mě určitě kontaktujte.