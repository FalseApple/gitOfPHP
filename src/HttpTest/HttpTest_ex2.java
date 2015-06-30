package HttpTest;

import org.apache.http.Header;
import org.apache.http.HeaderElement;
import org.apache.http.HeaderElementIterator;
import org.apache.http.HeaderIterator;
import org.apache.http.HttpResponse;
import org.apache.http.HttpStatus;
import org.apache.http.HttpVersion;
import org.apache.http.NameValuePair;
import org.apache.http.message.BasicHeaderElementIterator;
import org.apache.http.message.BasicHttpResponse;

public class HttpTest_ex2 {
	public static void main(String[] args) {
		/*
		 * 一個HTTP消息可以包含一系列headers参數描述信息，例如內容長度，內容類型等。
		 *  HttpClient的提供方法來檢索，添加，刪除和枚舉headers。
		 */
		HttpResponse response = new BasicHttpResponse(HttpVersion.HTTP_1_1,
				HttpStatus.SC_OK, "OK");
		response.addHeader("Set-Cookie", "c1=a; path=/; domain=localhost");
		response.addHeader("Set-Cookie",
				"c2=b; path=\"/\", c3=c; domain=\"localhost\"");
		/********************* 方法1 *********************/
		Header h1 = response.getFirstHeader("Set-Cookie");
		System.out.println(h1);
		Header h2 = response.getLastHeader("Set-Cookie");
		System.out.println(h2);
		Header[] hs = response.getHeaders("Set-Cookie");
		System.out.println(hs.length);
		/********************* 方法2 *********************/
		HeaderIterator it = response.headerIterator("Set-Cookie");
		while (it.hasNext()) {
			System.out.println(it.next());
		}
		/********************* 方法3 *********************/
		HeaderElementIterator it1 = new BasicHeaderElementIterator(
				response.headerIterator("Set-Cookie"));

		while (it1.hasNext()) {
			HeaderElement elem = it1.nextElement();
			System.out.println(elem.getName() + " = " + elem.getValue());
			NameValuePair[] params = elem.getParameters();
			for (int i = 0; i < params.length; i++) {
				System.out.println(" " + params[i]);
			}
		}
		/********************* 方法3 *********************/

		HttpResponse response1 = new BasicHttpResponse(HttpVersion.HTTP_1_1,

		HttpStatus.SC_OK, "OK");

		response1.addHeader("Set-Cookie",

		"c1=a; path=/; domain=localhost");

		response1.addHeader("Set-Cookie",

		"c2=b; path=\"/\", c3=c; domain=\"localhost\"");

		HeaderIterator it2= response1.headerIterator("Set-Cookie");

		while (it2.hasNext()) {

			System.out.println(it2.next());

		}

	}
}
