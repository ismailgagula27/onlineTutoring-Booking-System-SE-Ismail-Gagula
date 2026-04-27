# Tutor Booking System (Lab 8 Mini Project)

A simple web application for booking tutoring sessions with basic payment selection and session management.

## Project Description

This project allows users to book tutoring sessions by entering their name, time, and selecting a payment method. Sessions are stored persistently using a JSON-based backend and displayed dynamically on the frontend.

## Tech Stack

- HTML5
- Vanilla JavaScript
- PHP (Backend API)
- JSON file (data persistence)
- Git & GitHub

## Connection to Lab 5–7 Topic

I analyzed an Online Tutoring Booking System in Labs 5–7 (category: Booking / Reservation). This project is a simplified implementation of the same domain, focusing on session booking, payment handling, and basic system architecture improvements using design patterns.

## Patterns Applied

### 1. Singleton
- **File:** `backend/Database.php`
- Ensures only one instance is used for accessing session data.
- Solves repeated file access and centralizes data handling.

### 2. Strategy
- **Files:** `backend/strategies/PaymentStrategy.php`, `CardPayment.php`, `CashPayment.php`
- Encapsulates different payment methods into separate interchangeable classes.
- Removes conditional logic from payment processing.

### 3. Facade
- **File:** `backend/services/BookingService.php`
- Provides a simplified interface for booking sessions.
- Hides complexity of database access and payment logic.


## Features

- Book tutoring sessions
- Select payment method (Card/Cash)
- View all booked sessions
- Persistent storage using JSON

## Deployment