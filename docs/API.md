<!-- markdownlint-disable MD012 -->
# API documentation

- [API documentation](#api-documentation)
  - [Authentication](#authentication)
    - [logout](#logout)
    - [login](#login)
  - [User](#user)
    - [me](#me)
  - [Companies](#companies)
    - [getCompany](#getcompany)
    - [InsertCompany](#insertcompany)
  - [Customers](#customers)
    - [getCustomer](#getcustomer)
    - [createCustomer](#createcustomer)
    - [updateCustomer](#updatecustomer)
    - [deleteCustomer](#deletecustomer)
  - [Contact](#contact)
    - [deleteContact](#deletecontact)
    - [createContact](#createcontact)
    - [updateContacts](#updatecontacts)
    - [getContact](#getcontact)
  - [Quotes](#quotes)
    - [updateQuote](#updatequote)
    - [quote](#quote)
    - [createQuote](#createquote)
    - [deleteQuote](#deletequote)
  - [Invoices](#invoices)
    - [createInvoice](#createinvoice)
    - [deleteInvoice](#deleteinvoice)
    - [updateInvoice](#updateinvoice)
    - [Invoice](#invoice)


&nbsp; <!-- break line -->


## Authentication

### logout

> Description

**URL** : `/api/logout`
**Authentication required** : `true`
**Method** : `GET`

| Key | Required | Default | Type | Description |
| --- | --- | --- | --- | --- |

---

### login

> Description

**URL** : `/api/airlock/login`
**Authentication required** : `false`
**Method** : `POST`

| Key | Required | Default | Type | Description |
| --- | --- | --- | --- | --- |
| email | unspecified | unspecified | text |  |
| password | unspecified | unspecified | text |  |
| device_name | unspecified | unspecified | text |  |

---


&nbsp; <!-- break line -->


## User

### me

> Description

**URL** : `/api/me`
**Authentication required** : `true`
**Method** : `GET`

| Key | Required | Default | Type | Description |
| --- | --- | --- | --- | --- |

---


&nbsp; <!-- break line -->


## Companies

### getCompany

> Description

**URL** : `/api/company`
**Authentication required** : `true`
**Method** : `GET`

| Key | Required | Default | Type | Description |
| --- | --- | --- | --- | --- |

---

### InsertCompany

> Description

**URL** : `/api/createCompany`
**Authentication required** : `true`
**Method** : `POST`

| Key | Required | Default | Type | Description |
| --- | --- | --- | --- | --- |
| legal_form | unspecified | unspecified | text |  |
| default_down_payment_percentage | unspecified | unspecified | Integer |  |
| email | unspecified | unspecified | text |  |
| default_revive_delay_in_days | unspecified | unspecified | Integer |  |
| default_quote_notice | unspecified | unspecified | Integer |  |
| capital_in_cents | unspecified | unspecified | Integer |  |
| bban_anytmie | unspecified | unspecified | Integer |  |
| siret | unspecified | unspecified | Integer |  |
| phone | unspecified | unspecified | Integer |  |
| city | unspecified | unspecified | text |  |
| notes | unspecified | unspecified | text |  |
| street_number | unspecified | unspecified | Integer |  |
| street_name | unspecified | unspecified | text |  |
| default_payment_method | unspecified | unspecified | text |  |
| default_payment_terms | unspecified | unspecified | text |  |
| default_payment_delay_in_days | unspecified | unspecified | Integer |  |
| default_invoice_notice | unspecified | unspecified | Integer |  |
| bban | unspecified | unspecified | Integer |  |
| insurance | unspecified | unspecified | text |  |
| default_quote_validity_delay_in_days | unspecified | unspecified | Integer |  |
| zipcode | unspecified | unspecified | Integer |  |
| default_quote_accepting_conditions | unspecified | unspecified | Integer |  |
| name | unspecified | unspecified | text |  |

---


&nbsp; <!-- break line -->


## Customers

### getCustomer

> Description

**URL** : `/api/customers`
**Authentication required** : `true`
**Method** : `POST`

| Key | Required | Default | Type | Description |
| --- | --- | --- | --- | --- |
| id_company | unspecified | unspecified | Integer |  |

---

### createCustomer

> Description

**URL** : `/api/createCustomer`
**Authentication required** : `true`
**Method** : `POST`

| Key | Required | Default | Type | Description |
| --- | --- | --- | --- | --- |
| customer_type | unspecified | unspecified | text |  |
| status | unspecified | unspecified | text |  |
| meeting_date | unspecified | unspecified | Integer |  |
| company_name | unspecified | unspecified | text |  |
| siret | unspecified | unspecified | Integer |  |
| tva_number | unspecified | unspecified | Integer |  |
| firstname | unspecified | unspecified | text |  |
| lastname | unspecified | unspecified | text |  |
| street_number | unspecified | unspecified | Integer |  |
| stret_name | unspecified | unspecified | text |  |
| zipcode | unspecified | unspecified | Integer |  |
| city | unspecified | unspecified | text |  |
| note | unspecified | unspecified | text |  |
| default_payement_method | unspecified | unspecified | text |  |
| company | unspecified | unspecified | Integer |  |

---

### updateCustomer

> Description

**URL** : `/api/updateCustomer`
**Authentication required** : `true`
**Method** : `POST`

| Key | Required | Default | Type | Description |
| --- | --- | --- | --- | --- |
| id | unspecified | unspecified | Integer |  |
| customer_type | unspecified | unspecified | text |  |
| status | unspecified | unspecified | text |  |
| meeting_date | unspecified | unspecified | Integer |  |
| company_name | unspecified | unspecified | text |  |
| siret | unspecified | unspecified | Integer |  |
| tva_number | unspecified | unspecified | Integer |  |
| firstname | unspecified | unspecified | text |  |
| lastname | unspecified | unspecified | text |  |
| street_number | unspecified | unspecified | Integer |  |
| street_name | unspecified | unspecified | Integer |  |
| zipcode | unspecified | unspecified | Integer |  |
| city | unspecified | unspecified | text |  |
| note | unspecified | unspecified | text |  |
| default_payment_method | unspecified | unspecified | Integer |  |
| company | unspecified | unspecified | Integer |  |
| kjn | unspecified | unspecified | Integer |  |

---

### deleteCustomer

> Description

**URL** : `/api/deleteCustomer`
**Authentication required** : `true`
**Method** : `POST`

| Key | Required | Default | Type | Description |
| --- | --- | --- | --- | --- |
| id | unspecified | unspecified | Integer |  |

---


&nbsp; <!-- break line -->


## Contact

### deleteContact

> Description

**URL** : `/api/deleteContact`
**Authentication required** : `true`
**Method** : `POST`

| Key | Required | Default | Type | Description |
| --- | --- | --- | --- | --- |
| id_contact | unspecified | unspecified | Integer |  |

---

### createContact

> Description

**URL** : `/api/createContact`
**Authentication required** : `true`
**Method** : `POST`

| Key | Required | Default | Type | Description |
| --- | --- | --- | --- | --- |
| id_customer | unspecified | unspecified | Integer |  |
| job | unspecified | unspecified | text |  |
| firstname | unspecified | unspecified | text |  |
| gender | unspecified | unspecified | text |  |
| lastname | unspecified | unspecified | text |  |
| email | unspecified | unspecified | text |  |
| phone_mobile | unspecified | unspecified | Integer |  |
| phone_fix | unspecified | unspecified | Integer |  |
| phone_personnal | unspecified | unspecified | Integer |  |
| phone_fax | unspecified | unspecified | Integer |  |
| notes | unspecified | unspecified | text |  |

---

### updateContacts

> Description

**URL** : `/api/updateContact`
**Authentication required** : `true`
**Method** : `POST`

| Key | Required | Default | Type | Description |
| --- | --- | --- | --- | --- |
| id_contact | unspecified | unspecified | Integer |  |
| gender | unspecified | unspecified | text |  |
| firstname | unspecified | unspecified | text |  |
| lastname | unspecified | unspecified | text |  |
| job | unspecified | unspecified | text |  |
| email | unspecified | unspecified | text |  |
| phone_mobile | unspecified | unspecified | Integer |  |
| phone_fix | unspecified | unspecified | Integer |  |
| phone_personnal | unspecified | unspecified | Integer |  |
| phone_fax | unspecified | unspecified | Integer |  |
| notes | unspecified | unspecified | text |  |

---

### getContact

> Description

**URL** : `/api/contact`
**Authentication required** : `true`
**Method** : `POST`

| Key | Required | Default | Type | Description |
| --- | --- | --- | --- | --- |
| id_customer | unspecified | unspecified | Integer |  |

---


&nbsp; <!-- break line -->


## Quotes

### updateQuote

> Description

**URL** : `/api/updateQuote`
**Authentication required** : `true`
**Method** : `POST`

| Key | Required | Default | Type | Description |
| --- | --- | --- | --- | --- |
| company_id | unspecified | unspecified | Integer |  |
| customer_id | unspecified | unspecified | Integer |  |
| qualification | unspecified | unspecified | text |  |
| ediition_date | unspecified | unspecified | Integer |  |
| validity_delay_in_days | unspecified | unspecified | Integer |  |
| payment_delay_in_days | unspecified | unspecified | Integer |  |
| payment_terms | unspecified | unspecified | text |  |
| payment_method | unspecified | unspecified | text |  |
| down_payment_percentage | unspecified | unspecified | Integer |  |
| notice | unspecified | unspecified | text |  |
| accepting_conditions | unspecified | unspecified | text |  |
| sending_date | unspecified | unspecified | Integer |  |
| revived_date | unspecified | unspecified | Integer |  |
| last_qualification_date | unspecified | unspecified | Integer |  |

---

### quote

> Description

**URL** : `/api/quote`
**Authentication required** : `true`
**Method** : `POST`

| Key | Required | Default | Type | Description |
| --- | --- | --- | --- | --- |
| company | unspecified | unspecified | Integer |  |
| customer_id | unspecified | unspecified | Integer |  |

---

### createQuote

> Description

**URL** : `/api/createQuote`
**Authentication required** : `true`
**Method** : `POST`

| Key | Required | Default | Type | Description |
| --- | --- | --- | --- | --- |
| company_id | unspecified | unspecified | Integer |  |
| customer_id | unspecified | unspecified | Integer |  |
| qualification | unspecified | unspecified | text |  |
| ediition_date | unspecified | unspecified | Integer |  |
| validity_delay_in_days | unspecified | unspecified | Integer |  |
| payment_delay_in_days | unspecified | unspecified | Integer |  |
| payment_terms | unspecified | unspecified | text |  |
| payment_method | unspecified | unspecified | text |  |
| down_payment_percentage | unspecified | unspecified | Integer |  |
| notice | unspecified | unspecified | text |  |
| accepting_conditions | unspecified | unspecified | text |  |
| sending_date | unspecified | unspecified | Integer |  |
| revived_date | unspecified | unspecified | Integer |  |
| last_qualification_date | unspecified | unspecified | Integer |  |

---

### deleteQuote

> Description

**URL** : `/api/deleteQuote`
**Authentication required** : `true`
**Method** : `POST`

| Key | Required | Default | Type | Description |
| --- | --- | --- | --- | --- |
| id | unspecified | unspecified | Integer |  |

---

&nbsp; <!-- break line -->


## Invoices

### createInvoice

> Description

**URL** : `/api/createInvoice`
**Authentication required** : `true`
**Method** : `POST`

| Key | Required | Default | Type | Description |
| --- | --- | --- | --- | --- |
| company_id | unspecified | unspecified | Integer |  |
| customer_id | unspecified | unspecified | Integer |  |
| qualification | unspecified | unspecified | text |  |
| edition_date | unspecified | unspecified | Integer |  |
| payment_date | unspecified | unspecified | Integer |  |
| payment_delay_in_days | unspecified | unspecified | Integer |  |
| payment_terms | unspecified | unspecified | text |  |
| notice | unspecified | unspecified | text |  |
| payment_method | unspecified | unspecified | text |  |
| sending_date | unspecified | unspecified | Integer |  |
| revived_date | unspecified | unspecified | Integer |  |
| last_qualification_date | unspecified | unspecified | Integer |  |
| chasing_date | unspecified | unspecified | Integer |  |
| note | unspecified | unspecified | text |  |
| original_quote | unspecified | unspecified | Integer |  |

---

### deleteInvoice

> Description

**URL** : `/api/deleteInvoice`
**Authentication required** : `true`
**Method** : `POST`

| Key | Required | Default | Type | Description |
| --- | --- | --- | --- | --- |
| id | unspecified | unspecified | Integer |  |

---

### updateInvoice

> local

**URL** : `/api/updateInvoice`
**Authentication required** : `true`
**Method** : `POST`

| Key | Required | Default | Type | Description |
| --- | --- | --- | --- | --- |
| company_id | unspecified | unspecified | Integer |  |
| customer_id | unspecified | unspecified | Integer |  |
| qualification | unspecified | unspecified | text |  |
| edition_date | unspecified | unspecified | Integer |  |
| payment_date | unspecified | unspecified | Integer |  |
| payment_delay_in_days | unspecified | unspecified | Integer |  |
| payment_terms | unspecified | unspecified | text |  |
| notice | unspecified | unspecified | text |  |
| payment_method | unspecified | unspecified | text |  |
| sending_date | unspecified | unspecified | Integer |  |
| revived_date | unspecified | unspecified | Integer |  |
| last_qualification_date | unspecified | unspecified | Integer |  |
| chasing_date | unspecified | unspecified | Integer |  |
| note | unspecified | unspecified | text |  |
| original_quote | unspecified | unspecified | Integer |  |

---

### Invoice

> Description

**URL** : `/api/invoice`
**Authentication required** : `true`
**Method** : `POST`

| Key | Required | Default | Type | Description |
| --- | --- | --- | --- | --- |
| company | unspecified | unspecified | Integer |  |
| customer_id | unspecified | unspecified | Integer |  |

---
