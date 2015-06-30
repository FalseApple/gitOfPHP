package HttpTest;

import java.io.IOException;
import java.io.InputStream;
import java.net.URI;
import java.net.URISyntaxException;
import java.util.ArrayList;
import java.util.List;

import org.apache.http.HttpEntity;
import org.apache.http.NameValuePair;
import org.apache.http.ParseException;
import org.apache.http.client.methods.CloseableHttpResponse;
import org.apache.http.client.methods.HttpGet;
import org.apache.http.client.utils.URIUtils;
import org.apache.http.client.utils.URLEncodedUtils;
import org.apache.http.entity.ContentType;
import org.apache.http.entity.StringEntity;
import org.apache.http.impl.client.CloseableHttpClient;
import org.apache.http.impl.client.HttpClients;
import org.apache.http.message.BasicNameValuePair;
import org.apache.http.util.EntityUtils;

// get傳遞方式
public class HttpTest_ex6 {
	public static void main(String[] args) throws ParseException, IOException,
			URISyntaxException {
		/********************方法一****************************/
		List<NameValuePair> qparams = new ArrayList<NameValuePair>();

		qparams.add(new BasicNameValuePair("q", "httpclient"));

		qparams.add(new BasicNameValuePair("btnG", "Google Search"));

		qparams.add(new BasicNameValuePair("aq", "f"));

		qparams.add(new BasicNameValuePair("oq", null));

		URI uri = URIUtils.createURI("http", "www.google.com", -1, "/search",

		URLEncodedUtils.format(qparams, "UTF-8"), null);

		HttpGet httpget = new HttpGet(uri);

		System.out.println(httpget.getURI());
/********************方法二****************************/
		URI uri1 = URIUtils.createURI("http", "www.google.com", -1, "/search",

		"q=httpclient&btnG=Google+Search&aq=f&oq=", null);

		HttpGet httpget1 = new HttpGet(uri1);

		System.out.println(httpget1.getURI());

	}

}
