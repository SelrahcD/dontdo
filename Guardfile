# A sample Guardfile
# More info at https://github.com/guard/guard#readme

guard :phpunit, :all_on_start => false, :tests_path => 'app/tests/', :cli => '--colors -c phpunit.xml' do
	watch(%r{^.+Test\.php$})
	watch(%r{^app/(.+)/(.+)\.php$}) { |m| "app/tests/#{m[1]}/#{m[2]}Test.php"}
end