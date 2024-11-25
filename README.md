### **Zadanie 1: Zabezpieczenie ciasteczek sesyjnych**

W aplikacji logowanie odbywa się za pomocą ciasteczka przechowującego identyfikator sesji. Twoim zadaniem jest poprawienie konfiguracji ciasteczka, aby zapewnić jego bezpieczeństwo.

1.	Zabezpiecz ciasteczko session_id, aby chroniło dane użytkownika przed atakami, takimi jak XSS i CSRF. Dodaj odpowiednie atrybuty do ciasteczka.
2.	Upewnij się, że mechanizm wylogowywania usuwa ciasteczko session_id, unieważnia sesję użytkownika oraz uniemożliwia dostęp do chronionych stron bez ponownego zalogowania.
Zmodyfikuj kod w odpowiednich miejscach i przetestuj, czy ciasteczko działa zgodnie z oczekiwaniami.

Uruchomienie aplikacji:

Zainstaluj Flask komendą: pip install flask

Uruchom aplikacjię komendą:python app.py

Logowanie:
- user1, password1,
- user2, password2


### **Zadanie 2: Czas trwania sesji**
Rozbuduj aplikację o możliwość tworzenia trwałych sesji, w których użytkownik może zaznaczyć opcję „Zapamiętaj mnie” podczas logowania. Jeśli opcja zostanie zaznaczona, sesja powinna być ustawiona jako trwała (np. na 30 dni). Jeśli użytkownik nie wybierze tej opcji, sesja powinna wygasać po krótszym czasie (np. 5 minut).
1.	Dodaj w formularzu logowania opcję „Zapamiętaj mnie”.
2.	Zmień sposób ustawiania ciasteczek w funkcji login:
  	- Jeśli użytkownik zaznaczy „Zapamiętaj mnie”, ustaw ciasteczko session_id na dłuższy czas wygaśnięcia.
   	- Jeśli opcja nie zostanie zaznaczona, ustaw ciasteczko na krótszy czas wygaśnięcia.
3.	Zmodyfikuj funkcję logout - upewnij się, że ciasteczko session_id jest poprawnie usuwane podczas wylogowywania, niezależnie od jego czasu trwania.
4.	Sprawdź, czy sesje działają poprawnie w różnych scenariuszach. Użyj narzędzi deweloperskich przeglądarki (zakładka „Storage” → „Cookies”):

	- Zalogowanie i wylogowanie.
	-	Wygaśnięcie sesji po ustalonym czasie.
	-	Wybór opcji „Zapamiętaj mnie” i odtworzenie sesji po ponownym otwarciu przeglądarki.

### **Zadanie 3**
Twoim zadaniem jest przeanalizowanie konfiguracji ciasteczek na trzech wybranych stronach internetowych, aby ocenić, jak zarządzają one bezpieczeństwem użytkowników. Wybierz strony, które używają ciasteczek, takie jak sklep internetowy, serwis społecznościowy lub portal informacyjny. Przechwyć ciasteczka za pomocą narzędzi deweloperskich przeglądarki lub Burp Suite i sprawdź ich ustawienia, takie jak nazwa, zawartość, atrybuty (Secure, HttpOnly, SameSite) oraz czas wygaśnięcia. Spróbuj wyciągnąć wnioski na temat potencjalnych zagrożeń (np. możliwość przechwycenia danych, ataków XSS lub CSRF) oraz stopnia zabezpieczeń stosowanych przez analizowane strony.

Na podstawie tej analizy przygotuj krótkie podsumowanie dla każdej strony, wskazując:

1) Jakie ciasteczka są ustawione i jakie mają atrybuty?
2) Czy ich konfiguracja wskazuje na dbałość o bezpieczeństwo i prywatność?
3) Czy zauważyłeś jakieś potencjalne zagrożenia lub obszary wymagające poprawy?

Wskazówki techniczne:
1) Burp Suite: Skonfiguruj przeglądarkę na proxy 127.0.0.1:8080, aby przechwytywać ruch.
2) Narzędzia deweloperskie przeglądarki: Użyj zakładki Application → Storage → Cookies.
3) Szukaj ciasteczek w nagłówkach HTTP (Set-Cookie) oraz sprawdzaj ich atrybuty.
4) Korzystaj tylko z publicznie dostępnych stron i nie naruszaj warunków korzystania z ich usług.




