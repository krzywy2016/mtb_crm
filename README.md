# Instrukcja do zadania rozbudowy kodu CRM

---

## Edycja klienta – Loga dodatkowe

### 1.1 Edycja klienta

W sekcji edycji klienta [makieta](http://mbtmedia.iq.pl/rekrutacja/fullstack/rekrutacja-edycjaklienta.html) dodajemy sekcję Loga dodatkowe. Domyślnie puste, a gdy puste, wyświetlamy informację "Brak dodanego loga dodatkowego".

### 1.2 Dodaj logo dodatkowe

Przycisk "Dodaj logo dodatkowe" otwiera modal o tej samej nazwie, a w nim pole:
- Logo dodatkowe: File input, wymagane. Przyjmuje pliki png, jpg, jpeg. svg. 
- Tekst walidacji: "Logo musi być plikiem typu jpg, jpeg, png, .svg". 

### 1.3 Zapisz dodane logo dodatkowe

Przycisk "Zapisz" zapisuje dodane logo dodatkowe.

### 1.4 Usuń zapisane logo dodatkowe

Po zapisaniu wyświetlamy dodane logo w sekcji. Przed logiem umieszczamy przycisk "Usuń", który usuwa zapisane logo.

### 1.5 Podgląd przesłanego loga dodatkowego

Podgląd przesłanego loga wyświetlamy w wysokości max: 50px.

---

## Dodawanie i Edycja projektu

### 2.1 Dodaj kolejnego klienta

W dodawaniu i edycji projektu [makieta](http://mbtmedia.iq.pl/rekrutacja/fullstack/rekrutacja-dodajprojekt.html) pod polem klient, dodajemy przycisk "Dodaj kolejny", który po kliknięciu dodaje kolejny wiersz z polem select, na wybór kolejnego klienta. Funkcja pozwala przypisać kilku klientów do projektu.
Obok każdego wiersza na pole klienta umieszczamy przycisk "Usuń" - po kliknięciu usuwa wiersz klienta. Ważne: Jeśli został tylko jeden wiersz na pole klienta, przycisk "Usuń" jest zablokowany lub niewidoczny. Nie można usunąć wszystkich pól klienta – przynajmniej jedno jest wymagane.

### 2.2 Usuń klienta

Przycisk "Usuń" - po kliknięciu usuwa wiersz klienta. Jeśli został tylko jeden wiersz na pole klienta, przycisk "Usuń" jest zablokowany lub niewidoczny. Nie można usunąć wszystkich pól klienta – przynajmniej jedno jest wymagane.

### 2.3 Wybierz logo dla projektu

Na samym dole formularza, wyświetlamy sekcję "Wybierz logo", a w niej wszystkie loga klientów, którzy zostali wybrani w sekcji Klient. W sekcji wyświetlamy logo główne klienta oraz loga dodatkowe.
Użytkownik, za pomocą radio buttonów, może wybrać, które logo ma być przypisane do projektu. 
Przyjmujemy opcję, że wybrani klienci nie będą mieli przypisanego żadnego loga – wtedy sekcja jest pusta.

### 2.4 Oznacz logo główne w edycji projektu

W już istniejących projektach dla klientów, którzy mają logo główne, po wprowadzeniu zmian, to logo główne powinno być oznaczone jako wybrane w edycji projektu.

---

## Podgląd projektu – Dodawanie komentarzy

### 3.1 Dodaj komentarz

W podglądzie projektu, istnieje sekcja "Komentarze" - [makieta](http://mbtmedia.iq.pl/rekrutacja/fullstack/rekrutacja-zobacz-projekt.html). Dodaj mechanizm dodawania komentarzy używając pola "Komentarz" textarea oraz przycisku "Dodaj komentarz".

### 3.2 Usuń komentarz

Dla każdego dodanego komentarza dodajemy przycisk "Usuń", który po kliknięciu usuwa dany komentarz – bez przeładowania strony.
