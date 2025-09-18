# messagestreamblock

Ein Moodle-Block-Plugin für Moodle 4.5+, das einen interaktiven Button in der Seitenleiste bereitstellt, über den ein verschiebbares und größenveränderbares Popup geöffnet werden kann.  

Im Popup wird der **Message Stream** angezeigt, bereitgestellt durch das Plugin [`local_nmstream`](https://github.com/n-multimedia/local_nmstream).  

Dieses Plugin kann z.B. als virtueller Assistent genutzt werden

---

## Features

- Fügt einen Block hinzu, der in Kursen, auf der Startseite und in Aktivitäten angezeigt werden kann.
- Popup-Fenster mit:
  - Drag-and-Drop
  - Größenänderung
  - Eigenem Schließen-Button
  - Nur der Inhalt ist scrollbar, Header bleibt fix
- Anzeige des Message Streams aus `local_nmstream`
- Titel des Blocks kann über die Block-Konfiguration gesetzt werden
- Internationalisierung (mehrsprachige Unterstützung via Sprachdateien)
- Die Einstellung: "KI nur verfügbar in diesen Kursen: ..." wird im Plugin moodle-mod_messagestream eingestellt. Wenn dieses nicht existiert, wird keine KI genutzt.

---

## Voraussetzungen

- Moodle **4.5 oder höher**
- [local_nmstream](https://github.com/n-multimedia/local_nmstream) (wird automatisch als Abhängigkeit geprüft)

---

## Installation

1. Kopiere den Ordner `messagestreamblock` nach `blocks/`:
   ```bash
   mv messagestreamblock /path/to/your/moodle/blocks/
