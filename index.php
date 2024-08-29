<?php

const SPECIAL_CHAR = ['?', '!', '@', '$', '%'];

function checkLength($password){
    return strlen($password) >= 8;
}

function checkUppercase($password){
    for ($i = 0; $i < strlen($password); $i++) { // Correzione: aggiunto il simbolo $
        if (ctype_upper($password[$i])) {
            return true;
        }
    }
    return false;
}

function checkNumber($password){
    for ($i = 0; $i < strlen($password); $i++) { // Correzione: aggiunto il simbolo $
        if (is_numeric($password[$i])) {
            return true;
        }
    }
    return false;
}

function checkSpecialChar($password){
    for ($i = 0; $i < strlen($password); $i++) { // Correzione: aggiunto il simbolo $
        if (in_array($password[$i], SPECIAL_CHAR)) {
            return true;
        }
    }
    return false;
}

function globalCheck(){
    while (true) {
        $password = readline("Inserisci la tua nuova password:\n");

        if (!checkLength($password)) {
            echo "La password non può contenere meno di 8 caratteri, inseriscila nuovamente:\n";
            continue; // Salta il resto del ciclo e ripete la richiesta della password
        }

        if (!checkUppercase($password)) {
            echo "La password deve contenere almeno una lettera maiuscola, inseriscila nuovamente:\n";
            continue; // Salta il resto del ciclo e ripete la richiesta della password
        }

        if (!checkNumber($password)) {
            echo "La password deve contenere almeno un numero, inseriscila nuovamente:\n";
            continue; // Salta il resto del ciclo e ripete la richiesta della password
        }

        if (!checkSpecialChar($password)) {
            echo "La password deve contenere almeno un carattere speciale (es. ?, !, @, $, %), inseriscila nuovamente:\n";
            continue; // Salta il resto del ciclo e ripete la richiesta della password
        }

        echo "Password corretta\n"; // Aggiungi questa riga per stampare "Password corretta"
        return true; // Se tutte le condizioni sono soddisfatte, esce dal ciclo e ritorna true
    }
}

globalCheck();

?>
