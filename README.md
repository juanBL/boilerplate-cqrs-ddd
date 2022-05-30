<h1 align="center">
  🐘🎯 Hexagonal Architecture, DDD & CQRS in PHP
</h1>

<p align="center">
    <a href="#"><img src="https://img.shields.io/badge/Symfony-5.0-purple.svg?style=flat-square&logo=symfony" alt="Symfony 5.0"/></a>
</p>

<p align="center">
  Example of a <strong>PHP application using Domain-Driven Design (DDD) and Command Query Responsibility Segregation
  (CQRS) principles</strong> keeping the code as simple as possible.
  <br />
</p>

## 🚀 Environment Setup

### 🐳 Needed tools

1. [Install Docker](https://www.docker.com/get-started)
2. Clone this project: `git clone https://github.com/juanBL/boilerplate-cqrs-ddd`
3. Move to the project folder: `cd php-ddd-example`

### 🛠️ Environment configuration

1. Create a local environment file (`cp .env .env.local`) if you want to modify any parameter

### 🔥 Application execution

1. Install all the dependencies and bring up the project with Docker executing: `make build`

### ✅ Tests execution

1. Install the dependencies if you haven't done it previously: `make deps`
2. Execute PHPUnit and Behat tests: `make test`

## 👩‍💻 Project explanation

This project is a boiler plate. It's decoupled from any framework, but it has
some Symfony and Laravel implementations.

### ⛱️ Bounded Contexts

* [BoilerPlate](src/BoilerPlateContext): Place to look in if you wanna see some code 🙂.

### 🎯 Hexagonal Architecture

This repository follows the Hexagonal Architecture pattern. Also, it's structured using `modules`.
With this, we can see that the current structure of a Bounded Context is:

```scala
$ tree -L 4 src

src
|-- BoilerPlateContext // Company subdomain / Bounded Context: Features related to one of the company business lines / products
|   `-- BoilerPlateModule // Some Module inside the BoilerPlateContext context
|       |-- Application
|       |   |-- Create // Inside the application layer all is structured by actions
|       |   |-- Find
|       |-- Domain
|       |   |-- BoilerPlate.php // The Aggregate of the Module
|       |   |-- BoilerPlateCreatedDomainEvent.php // A Domain Event
|       |   |-- BoilerPlateFinder.php
|       |   |-- BoilerPlateNotFound.php
|       |   |-- BoilerPlateRepository.php // The `Interface` of the repository is inside Domain
|       `-- Infrastructure // The infrastructure of our module
|           |-- DependencyInjection
|           `-- Persistence
|               `--MySqlBoilerPlateRepository.php // An implementation of the repository
`-- Shared // Shared Kernel: Common infrastructure and domain shared between the different Bounded Contexts
    |-- Domain
    `-- Infrastructure
```

#### Repository pattern
Our repositories try to be as simple as possible usually only containing 2 methods `search` and `save`.
If we need some query with more filters we use the `Specification` pattern also known as `Criteria` pattern. So we add a
`searchByCriteria` method.

### Aggregates
You can see an example of an aggregate [here](src/BoilerPlateContext/BoilerPlateModule/Domain/BoilerPlate.php). All aggregates should
extend the [AggregateRoot](src/Shared/Domain/Aggregate/AggregateRoot.php).

### Command Bus
There is 1 implementations of the [command bus](src/Shared/Domain/Bus/Command/CommandBus.php).
1. [Sync](src/Shared/Infrastructure/Bus/Command/InMemorySymfonyCommandBus.php) using the Symfony Message Bus

### Query Bus
The [Query Bus](src/Shared/Infrastructure/Bus/Query/InMemorySymfonyQueryBus.php) uses the Symfony Message Bus.

### Event Bus
The [Event Bus](src/Shared/Infrastructure/Bus/Event/InMemory/InMemorySymfonyEventBus.php) uses the Symfony Message Bus.
The [MySql Bus](src/Shared/Infrastructure/Bus/Event/MySql/MySqlDoctrineEventBus.php) uses a MySql+Pulling as a bus.
The [RabbitMQ Bus](src/Shared/Infrastructure/Bus/Event/RabbitMq/RabbitMqEventBus.php) uses RabbitMQ C extension.
