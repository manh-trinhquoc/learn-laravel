# Dusk test
- web phải serve và reach được ở local với máy chạy test. giải pháp là chạy php artisan serve --port=80

## Design
 - Locations, Events, Languages, and Map sections will be database-driven
 - About, Contact Us, About the Book sections could get by as static HTML files
 - Extensive Model Relationships: HackerPair offers numerous examples of model relationships by including features such as event creation (events are owned by users), event favorites
(users can favorite many events), event locations (events belong to states, states have many
events), and so on.
## Mail
 - Xài mailgun thấy thẻ a bị lọc mất href. Xài gmail bình thường